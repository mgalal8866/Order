<?php

namespace App\Models;

use App\Models\UserAdmin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsto(User::class, 'client_id');
    }
    public function conversions()
    {
        return $this->belongsto(conversion::class, 'conversions_id');
    }
}
