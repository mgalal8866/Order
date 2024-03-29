<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SalesDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceDetailsResource;
use App\Http\Resources\SalesCollectionResource;
use App\Repositoryinterface\InvoRepositoryinterface;

use App\Http\Resources\InvoiceDeliveryDetailsResource;
use App\Http\Resources\SalesDeliveryCollectionResource;

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
    public function getdeliveryopeninvo(Request $request)
    {
        return Resp(new SalesDeliveryCollectionResource($this->invoRepositry->getdeliveryopeninvo()), 'success', 200, true);
    }
    public function getdeliverycloseinvo()
    {
        return Resp(new SalesDeliveryCollectionResource($this->invoRepositry->getdeliverycloseinvo()), 'success', 200, true);
    }
    public function getdeliverycloseinvodetails($id)
    {
        return Resp(InvoiceDeliveryDetailsResource::collection($this->invoRepositry->getdeliveryinvoicedetailsclose($id)), 'success', 200, true);
    }
    public function getdeliveryopeninvoedetails($id)
    {
        return Resp(InvoiceDeliveryDetailsResource::collection($this->invoRepositry->getdeliveryinvoicedetailsopen($id)), 'success', 200, true);
    }
}
