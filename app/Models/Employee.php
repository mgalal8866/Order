<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function deliveryheader()
    {
        return $this->hasMany(DeliveryHeader::class,'employ_id');
    }
    public function region()
    {
        return $this->belongsto(region::class, 'region_id');
    }
    public function job()
    {
        return $this->belongsto(jobs::class, 'job_id');
    }
    public function useradmin()
    {
        return $this->hasMany(useradmin::class,'emp_id');
    }
}
