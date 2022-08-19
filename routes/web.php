<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\SearchDateController;
use App\Http\Controllers\SearchUserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PitchController;
use App\Http\Controllers\admin\PeriodController;
use App\Http\Controllers\VerificationController;

use App\Http\Controllers\user\AuthUserController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\user\UserReservationController;
use App\Http\Controllers\user\AuthenticationUserController;

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

Route::get('/about',function(){
    return redirect('/#about');
})->name('about');
Route::get('/contact',function(){
    return redirect('/#contact');
})->name('contact');
Route::get('/services',function(){
    return redirect('/#services');
})->name('services');

Route::post('/send',[ContactController::class,'sendEmail'])->name('sendEmail');

Route::middleware('auth')->name('dashboard')->group(function(){
    Route::get('/dashboard',[AuthenticationUserController::class,'index'] );



});




Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    // Route::middleware('admin')->group(function(){
        // });
        Route::get('/',[AdminController::class,'index'])->name('index');
        Route::resource('/users',UserController::class);
        Route::resource('/pitches',PitchController::class);
        Route::resource('/periods',PeriodController::class);
        Route::resource('/reservations',ReservationController::class);

        Route::get('/reservations/index/searchDate',[SearchDateController::class,'searchDate'])->name('searchDate');
        Route::get('/reservations/index/searchUser',[SearchUserController::class,'searchUser'])->name('searchUser');
        });
        Route::get('/user/reservations/create/verifyDate',[VerificationController::class,'verifyDate'])->name('verifyDate');
        Route::get('/user/reservations/create/verifyPlace/{id?}',[VerificationController::class,'verifyPlace'])->name('verifyPlace');

Route::middleware(['auth'])->name('user.')->prefix('user')->group(function(){

        // Route::resource('/',AuthUserController::class);
        Route::resource('/reservations',UserReservationController::class);

});




require __DIR__.'/auth.php';
