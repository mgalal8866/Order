<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/sql', function (Request $request) {
    // http://order.com/sql?ip=DESKTOP-F8KF0NT\SQLEXPRESS&port=&database=DBOrder&username=mgalal&password=123456
    DB::purge('mysql');
    DB::purge('tenant');
    Config::set('database.connections.sqlsrv.host' , $request->ip??"DESKTOP-F8KF0NT\SQLEXPRESS");
    Config::set('database.connections.sqlsrv.port' , $request->port??null);
    Config::set('database.connections.sqlsrv.database' ,  $request->database??"DBOrder");
    Config::set('database.connections.sqlsrv.username' ,  $request->username??"mgalal");
    Config::set('database.connections.sqlsrv.password' ,  $request->password??"123456");
    DB::reconnect('sqlsrv');
    DB::setDefaultconnection('sqlsrv');
    return User::all();
});

