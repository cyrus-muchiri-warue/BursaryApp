<?php

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth','student'])->group(
    function (){
        Route::get('/StudentPortal', function () {
            return view('template\student\index');
        })->name('student.index');
        
    }
);







