<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    function getsetting() {
        $setting = setting::find(1);
        return Resp($setting->photo_main,'success',200);
    }
 }
