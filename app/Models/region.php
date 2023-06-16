<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class region extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    Public function getNameAttribute()
    {
        $region_name = 'region_name_'.config('err_message.config.lang_for_felid');
        return $this->$region_name;
    }
    public function city()
    {
        return $this->belongsTo(cities::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function scopeMain($query,$id){

        return region::whereId($id)->select('main','city_id')->first();
    }
}
