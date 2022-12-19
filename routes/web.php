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
Route::get('/all_cars', [WelcomeController::class,'posts'])->name('cars');
Route::get('/all_cars/{id}', [WelcomeController::class,'show'])->name('show');
Route::get('/showCategory', [WelcomeController::class,'showCategory'])->name('showCategory');


Route::group(['prefix' => 'home',  'middleware' => 'auth'], function()
{
    Route::resource("/posts/cars", CarsController::class);
    Route::get('/my_post', [WelcomeController::class,'my_post'])->name('myPosts');
});

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::resource("/carList", AdminController::class);
});
Route::get('/filter', [WelcomeController::class,'post'])->name('post');
