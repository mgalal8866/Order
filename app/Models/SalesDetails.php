<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function product_details()
    {
        return $this->belongsto(product_details::class, 'productd_id');
    }
    public function sale_header()
    {
        return $this->belongsto(SalesHeader::class,'sale_header_id');
    }
    
}
