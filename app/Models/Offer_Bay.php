<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_Bay extends Model
{
    use HasFactory;
    protected $table = 'offer_bays';
    protected $primaryKey = 'Offer_Bay_Id';
    protected $guarded = [];
}
