<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\SalesDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\InvoRepositoryinterface;

class SalesDetailsController extends Controller
{
    private $invoRepositry;
    public function __construct(InvoRepositoryinterface $invoRepositry)
    {
        $this->invoRepositry = $invoRepositry;
    }


    public function orderplase(Request $request){
        return  Resp(  $this->invoRepositry->placeorder($request) ,'success',200,true);
    }
}
