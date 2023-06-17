<?php


namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Models\region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getregionbycity($id)
    {

        return Resp(RegionResource::collection(region::where('city_id',$id)->get()),'success',200,true);
    }

}
