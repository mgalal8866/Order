<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayments extends Model
{
    use HasFactory;
    protected $primaryKey = 'PaymentsSup_id';
    protected $guarded = [];
}
