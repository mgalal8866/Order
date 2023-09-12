<?php

namespace App\Models;

use App\Models\PurchaseHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function purchaseheader()
    {
        return $this->hasMany(PurchaseHeader::class, 'Suppliers_id');
    }
}
