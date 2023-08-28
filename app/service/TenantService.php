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
        Config::set('queue.batching.database', 'tenant');
        Config::set('queue.failed.database', 'tenant');
        // Config::set('queue.default', 'tenant');


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
       $this->tenant   = $tenant;
       $this->domain   = $tenant->domin;
       $this->database = $tenant->database;
        $this->setting = Cache::get($tenant->domin.'_settings',[]);
        $this->changepusher();
        if(env('SHARE_VIEW',true) == true){
            // Config::set('database.connections.tenant.password', $tenant->password);
            View::share('setting',   $this->setting);
            View::share('categorys',Category::active(1)->parentonly()->get());
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
    public function changepusher()
    {
        Log::info('broadcasting',['broadcasting.connections.pusher.key'=> $this->setting->pusher_app_key??'',
        'broadcasting.connections.pusher.secret'=> $this->setting->pusher_app_SECRET??'',
        'broadcasting.connections.pusher.app_id'=> $this->setting->pusher_app_id??'']);
        Config::set('broadcasting.connections.pusher.key', $this->setting->pusher_app_key??'');
        Config::set('broadcasting.connections.pusher.secret', $this->setting->pusher_app_SECRET??'');
        Config::set('broadcasting.connections.pusher.app_id', $this->setting->pusher_app_id??'');

    }
    public function getdomain()
    {
        return $this->domain;
    }

    public function switchTanent(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }


        DB::purge('tenant');

        Config::set('database.connections.tenant.database', $tenant->database);
        Config::set('queue.batching.database', 'tenant');
        Config::set('queue.failed.database', 'tenant');
        // Config::set('queue.default', 'tenant');
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
        $this->setting = Cache::get($tenant->domin . '_settings', []);
        $this->changepusher();
        if (env('SHARE_VIEW', true) == true) {
            // Config::set('database.connections.tenant.password', $tenant->password);
            View::share('setting',   $this->setting);
            View::share('categorys', Category::active(1)->parentonly()->get());
        }
    }
}
