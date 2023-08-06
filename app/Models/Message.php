<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsto(User::class, 'client_id');
    }
    public function conversion()
    {
        return $this->belongsto(conversion::class, 'conversions_id');
    }
}
