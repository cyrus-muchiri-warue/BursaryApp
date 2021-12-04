<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Models\Application;
use Illuminate\Http\Request;

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

Route::middleware(['auth','institution'])->prefix('institution')->group(function(){
    Route::get('/index', function () {
        return view('template\institution\index');
    })->name('institution.index');
    Route::get('/search', function (Request $request) {
        $applications=Application::where('admission',$request->regNo)->latest()->get();

        
    return view('template\institution\institution-applications',compact('applications'));
    })->name('institution.applications');
    


});
