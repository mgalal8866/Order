<?php

namespace App\Models;

use App\Models\DeliveryHeader;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDelivery extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, HasFactory;
    protected $guard = 'delivery';
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function deliveryheader()
    {
        return $this->hasMany(DeliveryHeader::class,'user_id');
    }
    public function employee()
    {
        return $this->belongsto(Employee::class,'emp_id');
    }
}
