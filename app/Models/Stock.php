<?php

namespace App\Models;

use App\Models\ProductHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productheader()
    {
        return $this->belongsto(ProductHeader::class, 'product_id');
    }
}
