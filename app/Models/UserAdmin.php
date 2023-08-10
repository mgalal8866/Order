<?php

namespace App\Models;

use App\Models\Employee;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin  extends Authenticatable
{
    use  HasRoles ;
    use HasFactory;
      protected $guard = 'admin';
    protected $guarded = [];
    public function deliveryheader()
    {
        return $this->hasMany(DeliveryHeader::class,'user_id');
    }
    public function employee()
    {
        return $this->belongsto(Employee::class,'emp_id');
    }
}
