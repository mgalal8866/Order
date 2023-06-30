<?php

use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Dashboard\Product\ViewProduct;
use App\Http\Livewire\Dashboard\Units\Units;
use App\Http\Livewire\Dashboard\Users\Users;

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
Route::get('/vue', function () {
    return view('Vue.app');
})
->name('application');
Auth::routes();
Route::get('messages', [MessageController::class],'fetchMessages');
Route::post('messages', [MessageController::class],'sendMessage');
Route::get('/', [MessageController::class,'index']);
Route::post('send-message',  function (Request $request) {
// dd($request->input('username'), $request->input('message'));
    event(new MessageSent($request->username,$request->message));
    return ['success' => true];
});

// Route::get('/', function (Request $request) {
//     // $users = User::on('sqlsrv')->get(); //الديسك توب
//     // foreach ($users as $user) {
//     //     User::on('mysql')->updateOrCreate(
//     //         ['id' => $user->Client_id],
//     //         ['client_name' => $user->Client_name]
//     //     );
//     // }
//     return view('chat');
//     return Str::random(18);
// });
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
Route::prefix('admin/dashborad')->group(function () {
    Route::get('/', ViewProduct::class)->name('dashboard');
    Route::get('users', Users::class)->name('viewusers');
    Route::get('products', ViewProduct::class)->name('products');
    Route::get('units', Units::class)->name('units');
});

