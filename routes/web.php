<?php

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ApplicationController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Custom\Predict;

//require app_path()."\Custom\Predict.php";


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('template/guest/index');
});
Route::get('/cyrus', function () {
    $prdict=new Predict(1,10000,1000);
     echo $prdict->scoreCalculator();
   
});

  



Route::get('/home', function () {
    $user=User::where('id',Auth::user()->id)->first();
    
    if($user->hasRole('student'))
    {
        echo "student";
        return redirect(route("student.index"));
    }
    elseif ($user->hasRole('cdfOfficial')) {
        # code...
        echo "cdf";
      return   redirect(route("cdf.index"));
    }elseif ($user->hasRole('institutionOfficial')) {
        # code...
        echo "institution";
       return  redirect(route("institution.index"));
    }else {
        # code...
        return redirect('/');
    }
   

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/cdf.php';
require __DIR__.'/institution.php';
require __DIR__.'/student.php';
Route::resource('applications',ApplicationController::class);
Route::resource('applications.allocations',AllocationController::class);