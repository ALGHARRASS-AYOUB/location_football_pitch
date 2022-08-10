<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PitchController;
use App\Http\Controllers\admin\PeriodController;
use App\Http\Controllers\admin\ReservationController;

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
    return view('welcome');
});

Route::middleware('auth')->name('dashboard')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['admin']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['manager']);

});


Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    // Route::middleware('admin')->group(function(){
        // });
        Route::get('/',[AdminController::class,'index'])->name('index');
        Route::resource('/users',UserController::class);
        Route::resource('/pitches',PitchController::class);
        Route::resource('/periods',PeriodController::class);
        Route::resource('/reservations',ReservationController::class);
    // Route::middleware('manager')->group(function(){
    //     Route::resource('/users',UserController::class);
    //     Route::resource('/pitches',PitchController::class);
    //     Route::resource('/periods',PeriodController::class);
    //     Route::resource('/reservations',ReservationController::class);
    // });
});








require __DIR__.'/auth.php';
