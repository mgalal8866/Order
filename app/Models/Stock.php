<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productheader()
    {
        return $this->belongsto(ProductHeader::class, 'product_id');
    }
}
