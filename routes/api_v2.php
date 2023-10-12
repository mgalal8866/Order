<?php

use App\Models\logsync;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V2\UserController;

################# Start Login & Register #############
// Route::post('/login',   [UserController::class, 'login'])->name('login');
Route::get('/sendotp/{phone?}',   [UserController::class, 'sendotp'])->name('sendotp');
Route::post('/verificationcode',   [UserController::class, 'verificationcode'])->name('verificationcode');
Route::post('/login',   [UserController::class, 'login'])->name('login');
Route::post('/user/edit',    [UserController::class, 'edit'])->name('edit');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/sendtoken/{token}', [UserController::class, 'sendtoken'])->name('sendtoken');
################# End   Login & Register #############

################################### Forgot Password ##########################
################################### Forgot Password ##########################
Route::get('/check/phone/{phone?}',   [UserController::class, 'checkphone']);
Route::post('/check/answer',   [UserController::class, 'checkanswer']);
Route::get('/question',   [UserController::class, 'question']);
################################### Forgot Password ##########################
################################### Forgot Password ##########################

