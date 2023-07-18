<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsto(User::class, 'client_id');
    }
}