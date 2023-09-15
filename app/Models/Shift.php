<?php

namespace App\Models;

use App\Models\userdesck;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'Shift_Id';
    public function userdesck()
    {
        return $this->belongsto(userdesck::class, 'UserId');
    }
    public function safe()
    {
        return $this->belongsto(Safe::class, 'SafeId');
    }
}
