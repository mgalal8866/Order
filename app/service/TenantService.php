<?php

namespace App\service;

use App\Models\Tenant;
use App\Models\setting;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class TenantService
{
    private static $tenant;
    private static $domain;
    private static $database;

    public static function switchToTanent(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }

        DB::purge('mysql');
        DB::purge('tenant');

        Config::set('database.connections.tenant.database', $tenant->database);


        if ($tenant->username != null) {
            Config::set('database.connections.tenant.username', $tenant->username);
        }else{
            Config::set('database.connections.tenant.username', 'root');

        };

        if ($tenant->password != null) {
            Config::set('database.connections.tenant.password', $tenant->password);
        };

        DB::reconnect('tenant');
        DB::setDefaultconnection('tenant');
        Self::$tenant   = $tenant;
        Self::$domain   = $tenant->domain;
        Self::$database = $tenant->database;
        // Self::$username = $tenant->username;
        // Self::$password = $tenant->password;
        // View::share('setting',setting::first());
        // View::share('categorys',Category::active(1)->parentonly()->get());
    }

    public static function switchToDefault()
    {
        DB::purge('mysql');
        DB::purge('tenant');
        DB::reconnect('mysql');
        DB::setDefaultconnection('mysql');
    }

    public static function gettenant()
    {
        return Self::$tenant;
    }
}
