<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CateoryApp extends Model
{
    use HasFactory,UUID;
    protected $guarded = [];

    static function boot(){
        parent::boot();
        static::addGlobalScope('cat_active', function (Builder $builder) {
            $builder->where('cat_active', true); // or 1 if you are using tinyint
        });
    }



}
