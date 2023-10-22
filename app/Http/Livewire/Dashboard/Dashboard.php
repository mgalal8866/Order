<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\DeliveryHeader;
use App\Models\User;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\SalesHeader;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $data;
    public function render()
    {
        // $User = user::all();
        $User = DB::table('users');
        $this->data['count_product_active']  = ProductHeader::where('product_acteve', '1')->count();
        $this->data['count_product_uncative']  = ProductHeader::where('product_acteve', '0')->count();
        $this->data['count_client']   =  $User->count();
        $this->data['client_Balanc']       =  $User->sum('client_Balanc');
        $this->data['count_client_agel']   =  $User->where('default_Sael', '=', 'اجل')->count();
        $this->data['count_suppluer'] = Supplier::count();
        $this->data['count_order_close'] = SalesHeader::count();
        $this->data['count_order_open']  = DeliveryHeader::count();
        return view('livewire.dashboard.dashboard');
    }
}
