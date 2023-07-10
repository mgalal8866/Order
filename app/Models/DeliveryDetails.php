<?php

namespace App\Models;

use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
