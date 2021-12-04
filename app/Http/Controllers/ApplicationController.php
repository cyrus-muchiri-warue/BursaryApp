<?php

namespace App\Http\Controllers;
require app_path()."\Custom\Predict.php";

use App\Custom\Predict;
use App\Models\Application;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $applications=Application::all();
        return view('template.student.application-index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $institutions=Institution::all();
        return view('template.student.application-create',compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $application=new Application();
        $score=new Predict($request->ability,$request->billed,$request->paid);
        $application->user_id=Auth::user()->id;
        $application->institution_id=$request->institution_id;
        $application->yearofstudy=$request->yearofstudy;
        $application->academiclevel=$request->academiclevel;
        $application->admission=$request->admission;
        $application->gender=$request->gender;
        $application->dob=$request->dob;
        $application->parentals=$request->parentals;
        $application->ability=$request->ability;
        $application->billed=$request->billed;
        $application->paid=$request->paid;
        $application->score=$score->scoreCalculator();
        $application->gross_income=$request->gross;
        $application->constituency=$request->constituency;
        $application->ward=$request->ward;
        $application->village=$request->village;
        $application->save();
        
        return redirect(route('applications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
        $application=Application::find($application->id);
        return view('template.student.application-show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
        $application=Application::where('id',$application->id)->get();
        $institutions=Institution::all();
        return view('template.student.application-edit',compact('application','institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
        //return $request->all();
        $application=Application::find($application->id);
        $application->user_id=Auth::user()->id;
        $application->institution_id=$request->institution_id;
        $application->yearofstudy=$request->yearofstudy;
        $application->academiclevel=$request->academiclevel;
        $application->admission=$request->admission;
        $application->gender=$request->gender;
        $application->dob=$request->dob;
        $application->parentals=$request->parentals;
        $application->ability=$request->ability;
        $application->billed=$request->billed;
        $application->paid=$request->paid;
        $application->outstanding=$request->outstanding;
        $application->gross_income=$request->gross;
        $application->constituency=$request->constituency;
        $application->ward=$request->ward;
        $application->village=$request->village;
        $application->update();
        return redirect(route('applications.show',$application->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        Application::where('id',$application->id)->first()->delete();
        return redirect()->back();
    }
}
