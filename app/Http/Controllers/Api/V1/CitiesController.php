<?php


namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
     public function getcity()  {
        return Resp(CityResource::collection(cities::select('id','city_name_ar')->get()),'success',200,true);
     }
}
