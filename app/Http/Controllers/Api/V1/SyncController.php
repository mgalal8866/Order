<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SyncController extends Controller
{
    function client(Request $request) {
            return $request->all();
    }
    function clienttest() {
            return array(['id'=>'1']);
    }
    function categoryapp(Request $request) {

    }
}
