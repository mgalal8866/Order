<?php

namespace App\Http\Livewire;

use App\Facade\Tenants;
use Livewire\Component;

class MyHook
{

    public static function boot($component,$param)
    {
 
        Tenants::switchTanent($param);

    }
}
