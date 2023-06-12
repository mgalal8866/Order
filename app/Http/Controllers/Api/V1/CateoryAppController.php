<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoyAppResource;
use App\Models\CateoryApp;

class CateoryAppController extends Controller
{


    function getcategoryapp()
    {
        $CApp = CateoryApp::get();
        return  CategoyAppResource::collection($CApp) ;
    }
}
