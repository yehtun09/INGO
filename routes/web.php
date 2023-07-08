<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// use App\Http\Controllers\UserControler;

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

Route::get('/locale/{locale}',function($locale){
    Session::put('locale',$locale);

    return redirect()->back();
});
Route::group(['namespace' => 'App/Http/Controllers'], function () {

    //home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');


    Route::group(['middleware' => ['guest']], function () {

         //register
        Route::get("register", [RegisterController::class, 'show'])->name('register.show');
        Route::post("/register", [RegisterController::class, 'register'])->name('register.registration');

        //login
        Route::get("/login",[LoginController::class,"show"])->name("login.show");
        Route::post("/loginP",[LoginController::class,"login"])->name("login-perform");

    });

    Route::group(['middleware' => ['auth']], function () {
        //logout
        Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

    });

});


Route::prefix('admin')->group(function () {
    //    Route::get("user",[UserControler::class,'index']);

});
