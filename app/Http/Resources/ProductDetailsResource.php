<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {

        $units = $this->units($this->product_header_id)->get();

        return [
            "product_id"        =>$this->id,
            "productd_name"     =>$this->productheader->product_name??'',
            "productd_stock"    =>$this->stock->sum('quantity') != null ?'متوفر':'غير متوفر',
            "productd_wishlist" =>$this->wishlist->count()?true:false,
            "product_isscale"   =>$this->productheader->product_isscale,
            "productd_barcode"  =>$this->productd_barcode??'',
            "productd_image"    =>$this->productd_image??'',
            "productd_unit"     =>$this->productd_UnitType == 2 ?
                $units[$this->productd_UnitType - 1]->unit->unit_name . ' X ' . $this->unit->unit_name . ' = ' . $this->productd_size : ($this->productd_UnitType == 3 ? $units[$this->productd_UnitType - 2]->productd_size . "X" . $this->productd_size . "X" . $this->unit->unit_name . ' = ' . $units[$this->productd_UnitType - 2]->unit->unit_name :  $this->unit->unit_name),
            "productd_bay"      =>$this->productd_bay??0.00,
            "productd_Sele1"    =>$this->productd_Sele1??0.00,
            "productd_Sele2"    =>$this->productd_Sele2??0.00,
            "isoffer"           =>$this->isoffer,
            "maxqty"            =>$this->maxqty??0,
            "EndOferDate"       =>$this->EndOferDate??''
        ];
    }
}
