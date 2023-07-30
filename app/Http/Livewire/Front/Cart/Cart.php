<?php

namespace App\Http\Livewire\Front\Cart;

use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use App\Models\deferred;
use App\Models\Wishlist;
use App\Models\SalesHeader;
use Illuminate\Support\Str;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Models\DeliveryDetails;
use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $couponid = null, $totaloffer = 0, $culc = 0, $selectdeferreds = 0, $deferreds = 0, $cartlist = [], $subtotal = 0.00, $coupondisc = 0.00, $totalfinal, $coupon, $currency = ' ج.م';
    public function mount()
    {
        $deferreds = deferred::where('user_id', Auth::guard('client')->user()->id)->select('statu')->first();
        if ($deferreds) {
            $this->deferreds = $deferreds->statu;
        }
    }
    public function culc()
    {
        $this->subtotal = 0;
        $this->totaloffer = 0;
        foreach ($this->cartlist as $i) {

            if ($i['isoffer'] == 1) {
                $this->subtotal   +=   $i['cart']['qty'] * $i['productd_Sele2'];
                $this->totaloffer +=    ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_Sele2']);
            } else {
                $this->subtotal   +=   $i['cart']['qty'] * $i['productd_Sele1'];
            }
        }
    }
    public function usecoupon()
    {
        $coupon = Coupon::where('code', $this->coupon)->DateValid()->first();
        if ($coupon != null)
            if ($coupon->used > 0) {
                $deliveryheader = DeliveryHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('client')->id)->where('coupon_id', $coupon->id)->count();
                $saleheader = SalesHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('client')->id)->where('coupon_id', $coupon->id)->count();
                $ss = $saleheader + $deliveryheader;
                $mm = $coupon->where('code', $this->coupon)->Where('used', '>',  $ss)->DateValid()->first();
                if ($mm == null) {
                    return $this->dispatchBrowserEvent('notifi', ['message' => 'تم وصول للحد الاقصى لاستخدام الكوبون', 'type' => 'danger']);
                }
                $this->couponid = $coupon->id;
                $this->coupondisc = $coupon->value;
                return $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
            } else {
                $this->couponid = $coupon->id;
                $this->coupondisc = $coupon->value;
                return  $this->dispatchBrowserEvent('notifi', ['message' => '- تم اضافه الكوبون ', 'type' => 'success']);
            }
        return $this->dispatchBrowserEvent('notifi', ['message' => 'كوبون غير صالح', 'type' => 'danger']);

        // $coupon = Coupon::where('code', $this->coupon)->first();
        // if ($coupon) {
        //     $this->coupondisc = $coupon->value;
        //     $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
        // } else {
        //     $this->dispatchBrowserEvent('notifi', ['message' => 'كوبون غير صالح', 'type' => 'danger']);
        // }
    }
    public function pluse($index)
    {

        if ($this->cartlist[$index]['cart']['qty'] >= 1) {
            $this->cartlist[$index]['cart']['qty'] = $this->cartlist[$index]['cart']['qty'] + 1;
            $this->culc();
            ModelsCart::where('product_id', $this->cartlist[$index]['id'])->select('qty')->update(['qty' => $this->cartlist[$index]['cart']['qty']]);
        }
    }
    public function pleaceorder()
    {

        $header =  DeliveryHeader::create([

            'paytayp'           =>  $this->selectdeferreds == 0 ? 'كاش' : 'اجل',
            'total_profit'      => $request['data']['total_profit']??0,
            'invoicedate'       => Carbon::now(),
            'coupon_id'         => $this->couponid ?? null,
            'discount_product'  => $request['data']['discount_product']??0,
            'subtotal'          => $request['data']['subtotal']??0,
            'client_id'         => Auth::guard('client')->user()->id,
            'grandtotal'        => $request['data']['grandtotal']??0,
            'remaining'         => $request['data']['grandtotal']??0,
            'totaldiscount'     => $request['data']['totaldiscount']??0,
            'discount_g'        => $request['data']['discount_g']??0,
            'note'              => $request['data']['note']??'لايوجد ملاحظات',

            // 'invoicenumber' => '3',
            // 'coupon_id' =>
            // 'type_order' => 'تم الاستلام',
            // 'invoicetype' => 0,
            // 'invoicedate' => Carbon::now(),
            // 'client_id' =>
            // 'lastbalance' => '0.00',
            // 'finalbalance' => '0.00',
            // 'user_id' => 1,
            // 'store_id' => 1,
            // 'safe_id' => 1,
            // 'status' => 1,
            // 'employ_id' => 1,
            // 'dis_point_active' => 0,
            // 'paytayp' =>
            // 'subtotal' => $this->subtotal,
            // 'totaldiscount' => 0,
            // 'discount_g' => 0,
            // 'discount_f' => 0,
            // 'total_add_amount' => 0,
            // 'add_amount_g' => 0,
            // 'add_amount_f' => 0,
            // 'discount_product' => 0,
            // 'discount_sales' => 0,
            // 'discount_point' => 0,
            // 'grandtotal' => 0,
            // 'paid' => 0,
            // 'remaining' => 0,
            // 'total_profit' => 0,
            // 'deliverycost' => 0,
            // 'satus_delivery' => 0
        ]);
        foreach ($this->cartlist as $i) {
            DeliveryDetails::create([
                'sale_header_id'     => $header->id,
                'product_details_id' => $i->id,
                'buyprice'           => $i->productd_bay,
                'sellprice'          => ($i->isoffer == 1 ? $i->productd_Sele2 : $i->productd_Sele1),
                'quantity'           => $i['cart']['qty'],
                'subtotal'           => ($i->isoffer == 1 ? $i['cart']['qty'] * $i['productd_Sele2'] : $i['cart']['qty'] * $i['productd_Sele1']),
                'discount'           => ($i->isoffer == 1 ? ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_Sele2']) : 0),
                'grandtotal'         => ($i->isoffer == 1 ? $i['cart']['qty'] * $i['productd_Sele2'] : $i['cart']['qty'] * $i['productd_Sele1']),
                'profit'             => 0,
            ]);
        }
        //    ModelsCart::where('user_id', Auth::guard('client')->user()->id)->delete();

    }
    public function saveforlater($idproduct)
    {
        Wishlist::firstOrCreate(['user_id' => Auth::guard('client')->user()->id, 'product_id' => $idproduct]);
    }
    public function minus($index)
    {
        if ($this->cartlist[$index]['cart']['qty'] >= 2) {
            $this->cartlist[$index]['cart']['qty'] = $this->cartlist[$index]['cart']['qty'] - 1;
            $this->culc();
            ModelsCart::where('product_id', $this->cartlist[$index]['id'])->select('qty')->update(['qty' => $this->cartlist[$index]['cart']['qty']]);
        }
    }
    public function removefromcart($index)
    {
        ModelsCart::where('product_id', $this->cartlist[$index]['id'])->where('user_id', Auth::guard('client')->user()->id)->delete();
    }
    public function removecoupon()
    {
        $this->coupondisc = 0;
        $this->couponid = null;
        $this->reset('coupon');
    }
    public function render()
    {
        $this->cartlist = ProductDetails::whereHas('cart', function ($q) {
            return  $q->where('user_id', Auth::guard('client')->user()->id);
        })->with('unit')->with('cart')->with('productheader')->get();

        $this->culc();
        return view('livewire.front.cart.cart')->layout('layouts.front-end.layout');
    }
}
