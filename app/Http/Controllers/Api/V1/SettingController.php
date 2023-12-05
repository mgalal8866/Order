<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    function getsetting() {
        return Resp(setting::find(1),'success',200);
    }
 }
