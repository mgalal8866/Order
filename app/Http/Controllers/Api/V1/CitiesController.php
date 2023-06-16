<?php


namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
     public function getcity()  {
        return Resp(cities::all(),'success',200,true);
     }
}
