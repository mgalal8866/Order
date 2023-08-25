<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovementBank extends Model
{
    use HasFactory;
    protected $primaryKey = 'bank_id';
    protected $guarded = [];
}
