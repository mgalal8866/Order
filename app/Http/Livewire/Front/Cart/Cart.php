<?php

namespace App\Http\Livewire\Front\Cart;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\setting;
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
    public $cul = [
            'productdiscount'    => 0, 'finalsubtotal'    => 0, 'couponid'        => null, 'coupondisc'      => 0, 'coupontype'      => 0, 'total_profit'    => 0, 'subtotal'        => 0, 'totalfinal'      => 0, 'selectdeferreds' => 0, 'deferreds'       => 0, 'totaldiscount'   => 0, 'discount_g'      => 0
        ],
        $coupon, $currency = ' ج.م', $cartlist = [], $note = null, $setting;
    public function mount()
    {
        $this->setting = setting::find(1);
        $deferreds = deferred::where('user_id', Auth::guard('client')->user()->id)->select('statu')->first();
        if ($deferreds) {
            $this->cul['deferreds'] = $deferreds->statu;
        }
    }
    public function culc()
    {
        $this->cul['subtotal']      = 0;
        $this->cul['totaldiscount'] = 0;
        $this->cul['total_profit']  = 0;
        foreach ($this->cartlist as $i) {
            if ($i['isoffer'] == 1) {
                $this->cul['productdiscount'] += ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_Sele2']);
                $this->cul['subtotal']       +=  $i['cart']['qty'] * $i['productd_Sele2'];
                $this->cul['totaldiscount']  += ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_Sele2']);
                $this->cul['total_profit']   += ($i['cart']['qty'] * $i['productd_Sele2']) - ($i['cart']['qty'] * $i['productd_bay']);
            } else {
                $this->cul['subtotal']       +=  $i['cart']['qty'] * $i['productd_Sele1'];
                $this->cul['total_profit']   += ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_bay']);
            }
        }
        $this->cul['discount_g']    = ($this->cul['coupondisc'] > 0) ? ($this->cul['coupontype'] == 0 ?  (($this->cul['coupondisc'] / 100) * $this->cul['subtotal']) : $this->cul['coupondisc'])  : 0;
        $this->cul['finalsubtotal'] = ($this->cul['coupondisc'] > 0) ? ($this->cul['coupontype'] == 0 ?  $this->cul['subtotal'] * (1 - $this->cul['coupondisc'] / 100) : $this->cul['coupondisc']) : $this->cul['subtotal'];
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
                $this->cul['couponid'] = $coupon->id;
                $this->cul['coupontype'] = $coupon->type;
                $this->cul['coupondisc'] =  $coupon->value;

                return $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
            } else {
                $this->cul['couponid'] = $coupon->id;
                $this->cul['coupontype'] = $coupon->type;
                $this->cul['coupondisc'] =  $coupon->value;

                return  $this->dispatchBrowserEvent('notifi', ['message' => '- تم اضافه الكوبون ', 'type' => 'success']);
            }
        return $this->dispatchBrowserEvent('notifi', ['message' => 'كوبون غير صالح', 'type' => 'danger']);
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

            'paytayp'           => $this->cul['selectdeferreds'] == 0 ? 'كاش' : 'اجل',
            'total_profit'      => $this->cul['total_profit'] ?? 0,
            'invoicedate'       => Carbon::now(),
            'coupon_id'         => $this->cul['couponid'] ?? null,
            'discount_product'  => $this->cul['productdiscount'] ?? null,
            'subtotal'          => $this->cul['subtotal'] ?? 0,
            'client_id'         => Auth::guard('client')->user()->id,
            'grandtotal'        => $this->cul['finalsubtotal'] ?? 0,
            'remaining'         => 0,
            'totaldiscount'     => $this->cul['totaldiscount'] ?? 0,
            'discount_g'        => $this->cul['discount_g'] ?? 0,
            'note'              => $this->note ?? 'لا يوجد ملاحظات',
        ]);
        foreach ($this->cartlist as $i) {
            DeliveryDetails::create([
                'sale_header_id'     =>  $header->id,
                'product_details_id' =>  $i->id,
                'buyprice'           =>  $i->productd_bay,
                'sellprice'          => ($i->isoffer == 1 ? $i->productd_Sele2 : $i->productd_Sele1),
                'quantity'           =>  $i['cart']['qty'],
                'subtotal'           => ($i->isoffer == 1 ?  $i['cart']['qty'] * $i['productd_Sele2'] : $i['cart']['qty'] * $i['productd_Sele1']),
                'discount'           => ($i->isoffer == 1 ? ($i['cart']['qty'] * $i['productd_Sele1']) - ($i['cart']['qty'] * $i['productd_Sele2']) : 0),
                'grandtotal'         => ($i->isoffer == 1 ?  $i['cart']['qty'] * $i['productd_Sele2'] : $i['cart']['qty'] * $i['productd_Sele1']),
                'profit'             => ($i->isoffer == 1 ?  $i->productd_Sele2 : $i->productd_Sele1) - $i->productd_bay,
            ]);
        }

        redirect()->route('ordersuccess')->with(['status' => true, 'id' => $header->id]);
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
        $this->cul['coupondisc'] = 0;
        $this->cul['couponid']   = null;
        $this->cul['coupontype'] = null;
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
