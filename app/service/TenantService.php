<?php
 namespace App\service;

use App\Models\Tenant;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
class TenantService{
    private static $tenant;
    private static $domain;
    private static $database;
    private static $username;
    private static $password;

    public static function switchToTanent(Tenant $tenant){
        if(!$tenant instanceof Tenant)
        {
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }

        DB::purge('mysql');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database' , $tenant->database);
        DB::reconnect('tenant');
        DB::setDefaultconnection('tenant');
        Self::$tenant   = $tenant;
        Self::$domain   = $tenant->domain;
        Self::$database = $tenant->database;
        Self::$username = $tenant->username;
        Self::$password = $tenant->password;
    }

    public static function switchToDefault(){
            DB::purge('mysql');
            DB::purge('tenant');
            DB::reconnect('mysql');
            DB::setDefaultconnection('mysql');
    }

    public static function gettenant(){
        return Self::$tenant;
}
 }
