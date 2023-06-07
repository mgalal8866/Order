<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/login' ,    [UserController::class,'login'])->name('login');
Route::post('/register', [UserController::class,'register'])->name('register');

