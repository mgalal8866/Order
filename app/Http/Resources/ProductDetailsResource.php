<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "product_id"        =>$this->id,
            "productd_name"     =>$this->productheader->product_name??'',
            "productd_stock"    =>$this->Qtystockapi($this->productheader->stock->quantity),
            "productd_stockm"    =>$this->Qtystockapi($this->productheader->stockmany->sum('quantity')),
            "productd_wishlist" =>$this->wishlist->count()?true:false,
            "product_isscale"   =>$this->productheader->product_isscale,
            "productd_barcode"  =>$this->productd_barcode??'',
            "productd_image"    =>$this->productd_image??'',
            "productd_unit"     =>$this->Custunitapi($this->product_header_id),
            "productd_bay"      =>$this->productd_bay??0.00,
            "productd_Sele1"    =>$this->productd_Sele1??0.00,
            "productd_Sele2"    =>$this->productd_Sele2??0.00,
            "brand_id"          =>$this->productheader->brand_id??'',
            "urlyoutube"        =>$this->productheader->urlyoutube??'',
            "isoffer"           =>$this->isoffer,
            "maxqty"            =>$this->maxqty??0,
            "EndOferDate"       =>$this->EndOferDate??''
        ];
    }
}
