<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPayments extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function clientpay_source()
    {

        return $this->hasOne(User::class,'source_id');
    }


}
