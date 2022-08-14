<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PitchController;
use App\Http\Controllers\admin\PeriodController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\user\AuthUserController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\user\AuthenticationUserController;
use App\Http\Controllers\user\UserReservationController;

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
    if(Auth::check())
        return to_route('dashboard');
    return view('welcome');
});

Route::middleware('auth')->name('dashboard')->group(function(){
    Route::get('/dashboard',[AuthenticationUserController::class,'index'] );

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['manager']);

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['manager']);


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

        Route::get('/user/reservations/create/verifyDate',[VerificationController::class,'verifyDate'])->name('verifyDate');
        Route::get('/user/reservations/create/verifyPlace/{id?}',[VerificationController::class,'verifyPlace'])->name('verifyPlace');

Route::middleware(['auth'])->name('user.')->prefix('user')->group(function(){

        // Route::resource('/',AuthUserController::class);
        Route::resource('/reservations',UserReservationController::class);

});

// Route::get('user/{id}',function($id){
//         dd(User::find($id));
// })->middleware('auth');

//this is a bullshit






require __DIR__.'/auth.php';
