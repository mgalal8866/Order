<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'value'      => 'float',
        'min_invoce' => 'float',
    ];
    public function scopeDateValid($query)
    {
        $today = Carbon::now()->toDateString();
        return $query->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today);
    }
    public function salesheader()
    {
        return $this->hasMany(salesheader::class, 'coupon_id');
    }
    public function scopeCheckused($query)
    {

        if ($this->getAttribute('used') != 0) {
            $saleheader = SalesHeader::select('user_id', 'coupon_id')->where('user_id', Auth::user()->id)->where('coupon_id', $this->getAttribute('id'))->count();
             $query->Where('used', '>', $saleheader);
        }
        return $query;

        // dd( $query->get()->salesheader->where('user_id', Auth::user()->id)->where('coupon_id', $this->getAttribute('id')));

        // // $saleheader = SalesHeader::select('user_id', 'coupon_id')->where('user_id', Auth::user()->id)->where('coupon_id', $this->getAttribute('id'))->count();
        // dd($this->salesheader->where('user_id', Auth::user()->id)->where('coupon_id', $this->getAttribute('id')));
        // return $query->where('used', '>', $this->salesheader->count());
    }
}
