<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class,'index'])->name("landing");
Route::post("/twelvedata",[LandingController::class,"twelvedata"])->name('twelvedata');
Route::post("/register",[LandingController::class,"register"])->name('register');
Route::post("/yahoo_test",[LandingController::class,'yahoo_test'])->name('yahoo_test');
