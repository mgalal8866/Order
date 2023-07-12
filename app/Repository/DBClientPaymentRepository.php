<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\ClientPayments;

use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\ClientPaymentRepositoryinterface;

class DBClientPaymentRepository implements ClientPaymentRepositoryinterface
{
    public function getClientPayment(){
        return ClientPayments::where('clientpay_id', Auth::user('api')->id)->get();
    }
}
