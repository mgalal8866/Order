<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMoves extends Model
{
    use HasFactory;
    protected $table ='product_moves';
    protected $guarded = [];
}
