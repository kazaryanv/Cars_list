<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::group(['prefix' => 'home',  'middleware' => 'auth'], function()
{
    Route::resource("/posts/cars", CarsController::class);

});

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::resource("/carList", AdminController::class);
});

//Route::get("/admin", function(){
//    return view('/admin.dashboard');
//})->middleware("admin")->name('dashboard');

