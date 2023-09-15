<?php

namespace App\Models;

use App\Models\Safe;
use App\Models\Employee;
use App\Models\userdesck;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statements extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'Statement_id';
    public function employee()
    {
        return $this->belongsto(Employee::class, 'Emp_id');
    }
    public function userdesck()
    {
        return $this->belongsto(userdesck::class, 'user_id');
    }
    public function safe()
    {
        return $this->belongsto(Safe::class, 'safe_id');
    }
}
