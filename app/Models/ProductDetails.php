<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\SalesDetails;
use App\Models\ProductHeader;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetails extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $casts =
    // [
    //     'productd_Sele1' => 'float',
    //     'productd_Sele2' => 'float',
    // ];
    public function unit()
    {
        return $this->belongsto(unit::class, 'productd_unit_id');
    }
    public function productheader()
    {
        return $this->belongsto(ProductHeader::class, 'product_header_id');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
    public function salesdetails()
    {
        return $this->hasMany(SalesDetails::class, 'product_details_id');
    }
    public function cart()
    {
        return $this->hasone(Cart::class, 'product_id');
    }

    public function getOrginalimageAttribute()
    {
        return $this->getAttributes()['productd_image'];
    }
    public function getProductdImageAttribute($val)
    {
        return getimage($val, 'products');
        // $path = public_path('asset/images/products/' . $val);
        // if (File::exists($path)) {
        //     return ($val !== null) ? asset('asset/images/products/' . $val) : asset('asset/images/noimage.jpg');
        // } else {
        //     return asset('asset/images/noimage.jpg');
        // }
    }
    public function getIsofferAttribute($val)
    {
        if (($val == 1) && (Carbon::now()->diffInDays($this->getAttributes()['EndOferDate'], false) > 0)) {
            return true;
        } else {
            $this->update(['isoffer' => 0, 'EndOferDate' => null]);
            return false;
        };
    }
    public function getEndOferDateAttribute($val)
    {
        if ($val != null) {

            if ($this->getAttributes()['isoffer'] == 1) {
                return   "ينتهى بعد "  . Carbon::now()->diffInDays($val, false) . " أيام";
            }
        };
    }
    public function scopeUnits($query, $product_id)
    {
        return $query->where('product_header_id', $product_id)->select('productd_unit_id', 'productd_size')->with('unit');
    }
    public function scopeOnline($query)
    {
        return $query->where('productd_online', 1);
    }
    public function scopeInstock($query)
    {
        // $this->Qtystockapi($p->productheader->stockmany->sum('quantity')) == 'متوفر';
       // $type1 = $this->with(['productheader','productheader.productdetails'])->first();
        // $type =  $type1->productheader->productdetails()->pluck('productd_size', 'productd_UnitType');

        // Log::error($type1);
        // switch ($type1->productd_UnitType) {

        //     case (1):
        //         $qty = $type['1'];
        //         break;
        //     case (2):
        //         dd('');
        //         $qty = $type['1'] * $type['2'];
        //         break;
        //     case (3):
        //         $qty = $type['1'] * $type['2'] * $type['3'];
        //         break;
        // }
        // return  $query->WhereHas('productheader', function ($q) use( $qty) {
        //     $q->WhereHas('stock', function ($qq) use( $qty){
        //         $qq->where('quantity', '>', $qty);
        //     });
        // });
    }
    public function scopeGetcategory($query, $id = null)
    {
        return $query->WhereHas('productheader', function ($q) use ($id) {
            if ($id != null) $q->where('product_category', $id)->with('stock');
        })->with('productheader')->with('unit')->with('wishlist');
    }
    public function scopeGetoffers($query)
    {
        $today = Carbon::now()->toDateString();
        return $query->where('isoffer', '1')->where('productd_online', 1)->where('EndOferDate', '>=', $today)->with('productheader')->with('unit')->with('wishlist');
    }
    public function scopeCustunit($query)
    {
        $units = $query->units($this->product_header_id)->get();
        // return $this->productd_UnitType == 2 ?   $this->productd_size  . ' X ' .  $this->unit->unit_name . ' = ' . $units[$this->productd_UnitType - 2]->unit->unit_name  : ($this->productd_UnitType == 3 ?''. $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X"  . $this->unit->unit_name   . ' = ' .$units[$this->productd_UnitType - 2]->unit->unit_name  : $this->unit->unit_name);

        // return $this->productd_UnitType == 2 ?   (" $this->productd_size X  {$units[$this->productd_UnitType - 1]->unit->unit_name}  = <strong>  {$this->unit->unit_name}  </strong>")
        //     : ($this->productd_UnitType == 3 ? (" {$units[$this->productd_UnitType - 2]->productd_size} X{$this->productd_size} X {$units[$this->productd_UnitType - 2]->unit->unit_name}  = <strong>   {$this->unit->unit_name} </strong>") : "<strong>   {$this->unit->unit_name} </strong>");

        return $this->productd_UnitType == 2 ?   (" $this->productd_size X  {$units[$this->productd_UnitType - 1]->unit->unit_name}  = <strong>  {$this->unit->unit_name}  </strong>")
            : ($this->productd_UnitType == 3 ? (" {$units[$this->productd_UnitType - 2]->productd_size} X{$this->productd_size} X {$this->unit->unit_name}  = <strong>   {$units[$this->productd_UnitType - 2]->unit->unit_name} </strong>")
            : "<strong>   {$this->unit->unit_name} </strong>");
    }

    public function scopeCustunitapi($query)
    {
        // $units = $query->units($this->product_header_id)->get();
        // return $this->productd_UnitType == 2 ?
        //     $units[$this->productd_UnitType - 2]->unit->unit_name . ' X ' . $this->unit->unit_name . ' = ' . $this->productd_size : ($this->productd_UnitType == 3 ? $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X" . $this->unit->unit_name . ' = ' . $units[$this->productd_UnitType - 2]->unit->unit_name :  $this->unit->unit_name);
        $units = $query->units($this->product_header_id)->get();
        return $this->productd_UnitType == 2 ?
            $units[$this->productd_UnitType - 2]->unit->unit_name . ' X ' . $this->unit->unit_name . ' = ' . $this->productd_size
            // : ($this->productd_UnitType == 3 ? $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X" . $this->unit->unit_name . ' = ' . $units[$this->productd_UnitType - 2]->unit->unit_name
            : ($this->productd_UnitType == 3 ? $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X" .$units[$this->productd_UnitType - 2]->unit->unit_name . ' = ' . $this->unit->unit_name
            :  $this->unit->unit_name);
    }
    public function scopeQtystockapi($query, $qty)
    {
        $units = $query->units($this->product_header_id)->get();
        if ($qty == 0) {
            return    'غير متوفر';
        }
        switch ($this->productd_UnitType) {
            case (1):
                if ($this->productd_size == 0) {
                    return 'غير متوفر';
                };
                return ($qty / $this->productd_size) >= 1 ? 'متوفر' : 'غير متوفر';
                break;
            case (2):
                if ($this->productd_size == 0) {
                    return 'غير متوفر';
                };
                return ($qty / $this->productd_size) >= 1 ? 'متوفر' : 'غير متوفر';
                break;
            case (3):
                if ($this->productd_size == 0) {
                    return 'غير متوفر';
                };
                return ($qty / ($this->productd_size * $units[1]->productd_size)) >= 1 ? 'متوفر' : 'غير متوفر';
                break;
            default:
        }
        // return  $this->productd_size . $units[$this->productd_UnitType - 2]->productd_size;
    }
}
