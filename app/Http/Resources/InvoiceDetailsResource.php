<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'            =>$this->id??'',
            'sale_header_id'=>$this->sale_header_id??'',
            'product_details_id'=>$this->product_details_id??'',
            'product_name'  =>$this->productdetails->productheader->product_name??'',
            'product_barcode'  =>$this->productdetails->productd_barcode ??'',
            'product_unit'  =>$this->productdetails->Custunitapi($this->productdetails->product_header_id) ??'',
            'sellprice'     =>$this->sellprice??'',
            'quantity'      =>$this->quantity??'',
            'subtotal'      =>$this->subtotal??'',
            'discount'      =>$this->discount??'',
            'grandtotal'    =>$this->grandtotal??'',
            'profit'        =>$this->profit??'',
        ];
    }
}
