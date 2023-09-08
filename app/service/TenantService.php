<?php

namespace App\service;

use App\Models\Tenant;
use App\Models\setting;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;

class TenantService
{
    private  $tenant;
    private  $domain;
    private  $name;
    private  $database;
    private  $setting;
    public function switchToTanent(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }
        DB::purge('mysql');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);
        if ($tenant->username != null) {
            Config::set('database.connections.tenant.username', $tenant->username);
        } else {
            Config::set('database.connections.tenant.username', 'root');
        };
        if ($tenant->password != null) {
            Config::set('database.connections.tenant.password', $tenant->password);
        };
        DB::reconnect('tenant');
        DB::setDefaultconnection('tenant');
        $this->tenant   = $tenant;
        $this->domain   = $tenant->domin;
        $this->database = $tenant->database;
        $this->name     = $tenant->name;
        if (env('SHARE_VIEW', true) == true) {
            $this->setting = Cache::get($tenant->domin . '_settings', []);
            View::share('setting',   $this->setting);
            View::share('categorys', Category::active(1)->parentonly()->get());
        }
    }

    public  function switchToDefault()
    {
        DB::purge('mysql');
        DB::purge('tenant');
        DB::reconnect('mysql');
        DB::setDefaultconnection('mysql');
    }

    public function gettenant()
    {
        return $this->tenant;
    }
    
    public function getdomain()
    {
        return $this->domain;
    }
    public function gettenantname()
    {
        return    $this->name;
    }


    public function switchTanent($id)
    {
        $tenant =   Tenant::find($id);
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }
        DB::purge('mysql');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);
        if ($tenant->username != null) {
            Config::set('database.connections.tenant.username', $tenant->username);
        } else {
            Config::set('database.connections.tenant.username', 'root');
        };
        if ($tenant->password != null) {
            Config::set('database.connections.tenant.password', $tenant->password);
        };
        DB::reconnect('tenant');
        DB::setDefaultconnection('tenant');
        $this->tenant   = $tenant;
        $this->domain   = $tenant->domin;
        $this->database = $tenant->database;
    }
}
