<?php
use App\Http\Controllers\AuthController;


Route::get("/register", [AuthController::class, 'register_view'])->name("register-view");
Route::post("/register/store", [AuthController::class, 'register'])->name("register");
Route::get("/login", [AuthController::class, 'index'])->name("login-view");
Route::post("/login/store", [AuthController::class, 'login'])->name("login");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
