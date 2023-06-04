<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;


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
    $array = ['app1.order.com'=>'order1','app2.order.com'=>'order2'];
    $host  = $request->getHost();
    $keys  = array_keys($array);
    if(in_array($host,$keys)){
        $db = $array[$host];
        DB::purge('mysql');
        Config::set('database.connections.mysql.database' ,$db);
        DB::reconnect('mysql');

        return $host;
    }
   
    return view('welcome');
});
