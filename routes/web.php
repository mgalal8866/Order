<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\dashborad\UsersController;


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

Route::get('/', function (Request $request) {
    $users = User::on('sqlsrv')->get(); //الديسك توب
    foreach ($users as $user) {
        User::on('mysql')->updateOrCreate(
            ['id' => $user->Client_id],
            ['client_name' => $user->Client_name]
        );
    }
    return Str::random(18);
});
Route::get('/lay', function (Request $request) {
    return  view('layouts.app');
});
Route::get('/sql', function (Request $request) {
    DB::purge('mysql');
    DB::purge('tenant');

    Config::set('database.connections.sqlsrv.host', $request->ip ?? "DESKTOP-F8KF0NT\SQLEXPRESS");
    Config::set('database.connections.sqlsrv.port', "1433");
    Config::set('database.connections.sqlsrv.database',  $request->database ?? "DBOrder");
    Config::set('database.connections.sqlsrv.username',  $request->username ?? "mgalal");
    Config::set('database.connections.sqlsrv.password',  $request->password ?? "123456");
    DB::reconnect('sqlsrv');
    DB::setDefaultconnection('sqlsrv');
    return User::all();
});
Route::prefix('dashborad')->group(function () {
    Route::get('users', [UsersController::class,'getuser']);
});
