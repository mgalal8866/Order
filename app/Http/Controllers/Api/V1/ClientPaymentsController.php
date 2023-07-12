<?php


namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientPaymentResource;
use App\Repositoryinterface\ClientPaymentRepositoryinterface;

class ClientPaymentsController extends Controller
{
    private $clientpayment;
    public function __construct(ClientPaymentRepositoryinterface $clientpayment)
    {
        $this->clientpayment = $clientpayment;
    }

        public function getclientpayment(){

        $data =ClientPaymentResource::collection($this->clientpayment->getClientPayment());
        return Resp($data, 'Success', 200, true);
        }
}
