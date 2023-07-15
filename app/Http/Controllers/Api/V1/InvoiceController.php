<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SalesDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceDetailsResource;
use App\Http\Resources\SalesCollectionResource;
use App\Repositoryinterface\InvoRepositoryinterface;

class InvoiceController extends Controller
{
    private $invoRepositry;
    public function __construct(InvoRepositoryinterface $invoRepositry)
    {
        $this->invoRepositry = $invoRepositry;
    }
    public function orderplase(Request $request)
    {
        return  Resp($this->invoRepositry->placeorder($request), 'success', 200, true);
    }
    public function getopeninvo()
    {
        return Resp(new SalesCollectionResource($this->invoRepositry->getopeninvo()), 'success', 200, true);
    }
    public function getcloseinvo()
    {
        return Resp(new SalesCollectionResource($this->invoRepositry->getcloseinvo()), 'success', 200, true);
    }
    public function getcloseinvodetails($id)
    {
        return Resp(InvoiceDetailsResource::collection($this->invoRepositry->getinvoicedetailsclose($id)), 'success', 200, true);
    }
    public function getopeninvoedetails($id)
    {
        return Resp(InvoiceDetailsResource::collection($this->invoRepositry->getinvoicedetailsopen($id)), 'success', 200, true);
    }
}
