<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProductDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts =
    [
        'productd_Sele1' => 'float',
        'productd_Sele2' => 'float',
    ];
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
        return $this->hasMany(Wishlist::class,'product_id');
    }
    public function salesdetails()
    {
        return $this->hasMany(SalesDetails::class,'product_details_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class,'product_id');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class,'product_id');
    }
    public function getOrginalimageAttribute()
    {
            return $this->getAttributes()['productd_image'];
    }
    public function getProductdImageAttribute($val)
    {

        $path = public_path('asset/images/products/' . $val);
        if (File::exists($path)) {
            return ($val !== null) ? asset('asset/images/products/' . $val) : asset('asset/images/noimage.jpg');
        } else {
            return asset('asset/images/noimage.jpg');
        }
    }
    public function getIsofferAttribute($val)
    {
        if (($val == 1) && (Carbon::now()->diffInDays($this->getAttributes()['EndOferDate'], false) > 0)) {
            return true;
        } else {
            $this->update(['isoffer'=>0,'EndOferDate'=>null]);
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
    public function scopeGetcategory($query, $id)
    {
        return $query->WhereHas('productheader',function($q)use ($id){
                if($id != null) $q->where('product_category',$id);
            })->with('productheader')->with('unit')->with('stock')->with('wishlist');
    }
    public function scopeGetoffers($query)
    {
        $today = Carbon::now()->toDateString();
        return $query->where('isoffer','1')->where('productd_online', 1)->where('EndOferDate' ,'>=' , $today )->with('productheader')->with('unit')->with('stock')->with('wishlist');
    }
    public function scopeCustunit($query){
        $units = $query->units($this->product_header_id)->get();
        // return $this->productd_UnitType == 2 ?   $this->productd_size  . ' X ' .  $this->unit->unit_name . ' = ' . $units[$this->productd_UnitType - 2]->unit->unit_name  : ($this->productd_UnitType == 3 ?''. $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X"  . $this->unit->unit_name   . ' = ' .$units[$this->productd_UnitType - 2]->unit->unit_name  : $this->unit->unit_name);
        return $this->productd_UnitType == 2 ?   (" $this->productd_size X  {$units[$this->productd_UnitType - 1]->unit->unit_name}  = <strong>  {$this->unit->unit_name}  </strong>")
        : ($this->productd_UnitType == 3 ? (" {$units[$this->productd_UnitType - 2]->productd_size} X{$this->productd_size} X {$units[$this->productd_UnitType - 2]->unit->unit_name}  = <strong>   {$this->unit->unit_name} </strong>"): "<strong>   {$this->unit->unit_name} </strong>");



    }

}
