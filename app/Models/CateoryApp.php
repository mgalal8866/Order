<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CateoryApp extends Model
{
    use HasFactory, UUID;
    protected $guarded = [];
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    static function boot()
    {
        parent::boot();
        static::addGlobalScope('cat_active', function (Builder $builder) {
            $builder->where('cat_active', true); // or 1 if you are using tinyint
        });
    }
}
