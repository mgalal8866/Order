<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coupon;
use App\Models\comment;
use App\Models\Employee;
use App\Models\UserAdmin;
use App\Models\DeliveryDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryHeader extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function salesdetails()
    {
        return $this->hasMany(DeliveryDetails::class, 'sale_header_id');
    }
    public function coupon()
    {
        return $this->belongsto(Coupon::class, 'coupon_id');
    }
    public function user()
    {
        return $this->belongsto(User::class, 'client_id');
    }
    public function employee()
    {
        return $this->belongsto(Employee::class,'employ_id');
    }
    public function useradmin()
    {
        return $this->belongsto(UserAdmin::class,'user_id');
    }
    public function comment()
    {
        return $this->belongsto(comment::class, 'comment_id');
    }
    public function scopeStatus($query, $v)
    {
        return $query->where('satus_delivery', $v);
    }
    public function scopeDelivered($query)
    {
        return $query->where('type_order', '!=','تم التوصيل');
    }
}
