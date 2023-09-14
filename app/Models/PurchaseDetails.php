<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function purchaseheader()
    {
        return $this->belongsto(PurchaseHeader::class, 'Purchase_h_id');
    }
}
