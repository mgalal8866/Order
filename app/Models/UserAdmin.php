<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class UserAdmin  extends Authenticatable
{
    use  HasRoles ;
    use HasFactory;
    protected $guarded = [];

}
