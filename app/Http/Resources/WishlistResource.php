<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{

    public function toArray(Request $request): array
    {

        $units = $this->productdetails->units($this->productdetails->product_id)->get();
        return [
            "wishlist_id"    => $this->id,
            "productd_id"    => $this->productdetails->id,
            "productd_name"  => $this->productdetails->productheader->product_name??'',
            "product_isscale"=> $this->productdetails->productheader->product_isscale,
            "productd_barcode"=> $this->productdetails->productd_barcode??'',
            "productd_image" => $this->productdetails->productd_image??'',
            "productd_unit"  => $this->productdetails->productd_UnitType == 2 ?
                $units[$this->productdetails->productd_UnitType - 2]->unit->unit_name . ' X ' . $this->productdetails->unit->unit_name . ' = ' . $this->productdetails->productd_size : ($this->productdetails->productd_UnitType == 3 ? $units[$this->productdetails->productd_UnitType - 2]->productd_size . "X" . $this->productdetails->productd_size . "X" . $this->productdetails->unit->unit_name . ' = ' . $units[$this->productdetails->productd_UnitType - 2]->unit->unit_name :  $this->productdetails->unit->unit_name ??''),
            "productd_Sele1" => $this->productdetails->productd_Sele1??0.00,
            "productd_Sele2" => $this->productdetails->productd_Sele2??0.00,
            "isoffer"        => $this->productdetails->isoffer,
            "maxqty"         => $this->productdetails->maxqty??0,
            "EndOferDate"    => $this->productdetails->EndOferDate??''
        ];
    }
}
