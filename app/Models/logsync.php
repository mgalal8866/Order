<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class logsync extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected static function booted( )
    {
        static::creating(function ($model) {
            $model->source = request()->attributes->get('source_api');
        });
    }
}
