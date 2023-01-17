<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
require ("auth.php");

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

Route::get('/', [WelcomeController::class,'index'])->name('welcome');
Route::get('/all_cars', [WelcomeController::class,'cars'])->name('cars');
Route::get('/all_cars/{id}', [WelcomeController::class,'show'])->name('show');
Route::get('/error/sdkajbhfsndjkfvasdfgas/fdg5as4df4D6546SADFGVD/ASDKFJOWE', [WelcomeController::class,'error'])->name('errors');



Route::group(['prefix' => 'home',  'middleware' => 'auth'], function()
{
    Route::resource("/posts/cars", CarsController::class);
});
Route::group(['middleware' => 'auth'], function()
{
    Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
    {
        Route::resource("/carList", AdminController::class);
    });
});


