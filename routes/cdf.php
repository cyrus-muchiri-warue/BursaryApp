<?php

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InstitutionController;

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


Route::middleware(['auth','cdf'])->prefix('cdf')->group(
    function()
    {
        Route::get('/home', function () {
            return view('template.cdf.index');
        })->name('cdf.index');
        Route::get('applications',function(){
            $applications=Application::all();
           return view('template\cdf\applications-index',compact('applications'));
        })->name('cdf.applications.index');
        Route::get('applications/{id}',function($id){
            $application=Application::where('id',$id)->get();
             return view('template.cdf.applications-show',compact('application'));
        })->name('cdf.applications.show');
        Route::get('applications/{id}/',function($id){
            $application=Application::where('id',$id)->get();
             return view('template.cdf.applications-show',compact('application'));
        })->name('cdf.applications.show');

        Route::resource('/institutions',InstitutionController::class);
        
    }
);







