<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productdetails()
    {
        return $this->belongsto(ProductDetails::class, 'product_details_id');
    }
    public function sale_header()
    {
        return $this->belongsto(DeliveryHeader::class,'sale_header_id');
    }

}
