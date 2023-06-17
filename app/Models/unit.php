<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productdetails()
    {
        return $this->hasMany(ProductDetails::class,'productd_unit_id');
    }
}
