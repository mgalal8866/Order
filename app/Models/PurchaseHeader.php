<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHeader extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function supplier()
    {
        return $this->belongsto(Supplier::class, 'Suppliers_id');
    }
    public function scopeCountreturned($query)
    {
               return $query->where('InvoiceType', 1)->count();
    }
    public function scopeCountpurchase($query)
    {
               return $query->where('InvoiceType', 0)->count();
    }
    public function scopeSumreturned($query)
    {
               return $query->where('InvoiceType', 1)->sum('Grand_Total');
    }
    public function scopeSumpurchase($query)
    {
        return $query->where('InvoiceType', 0)->sum('Grand_Total');
    }


}
