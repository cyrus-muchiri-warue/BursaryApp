<?php

namespace App\Http\Controllers;

require app_path()."\Custom\Predict.php";
use App\Models\Allocation;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AllocationController extends Controller
{
    public $sugestedAmount;
    public function __construct() {
        
        $sugestedAmount=0;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application)
    {
        $user=User::find(Auth::user()->id);
        if($user->hasRole('student'))
        {  
            
            $allocations=Allocation::where("application_id",$application->id)->get();
        return view('template.student.applications-allocations-index',compact('allocations'));

        }elseif($user->hasRole('cdfOfficial')){
            $allocations=Allocation::where('application_id',$application->id)->get();
            return view('template.cdf.applications-allocation-index',compact('allocations','application'));
        }else{
            return redirect('/');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Application $application)
    {
        $application=Application::find($application->id);
        if($application->score>0)
        {
            $sugestedAmount=($application->score*10)/100*($application->billed-$application->paid);

        }else{
                $sugestedAmount=0;
        }

        
        
         return view('template.cdf.applications-allocation-create',compact('application','sugestedAmount'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Application $application,Request $request)
    {
      
        
        $allocation=new Allocation();
        $allocation->status=$request->status;
        $allocation->application_id=$request->application_id;
        $allocation->amountAwarded=$request->amountAwarded;
        $allocation->chequeNumber=$request->chequeNumber;
        $allocation->save();
        
         return redirect(route('cdf.applications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application,Allocation $allocation)
    {
        //
        return view('template.cdf.applications-allocation-show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application,Allocation $allocation)
    {
       
      $allocation=Allocation::find($application->allocation->id);
      return view('template.cdf.applications-allocation-edit',compact('allocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application,Allocation $allocation)
    {
        //
        //dd($request->all());
        $allocation=Allocation::find($allocation->id);
        $allocation->status=$request->status;
        $allocation->application_id=$request->application_id;
        $allocation->amountAwarded=$request->amountAwarded;
        $allocation->chequeNumber=$request->chequeNumber;
        $allocation->update();
        return  redirect(route('applications.allocations.index',$allocation->application->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application,Allocation $allocation)
    {

       
         $allocation=Allocation::where('application_id',$application->id)->first();
         $allocation->delete();
        return redirect()->back();
        
    }
}
