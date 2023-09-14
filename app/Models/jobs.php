<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;
    protected $primaryKey = 'jobs_id';
    protected $table = 'jobs_tpl';
    protected $guarded = [];
}
