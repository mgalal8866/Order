<?php

namespace Database\Seeders;


use App\Models\ApiToken;
use App\Models\setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      setting::create([
        'name_shop'          =>'Shop',
        'maneger_phone'      =>'010',
        'phone_shop'         =>'010',
        'address_shop'       =>'address',
        'logo_shop'          =>'logo.png',
        'message_report'     =>'msg',
        'delivery_amount'    =>'0.0',
        'delivery_message'   =>'msg',
        'salesstatus'        =>true,
        'point_system'       =>false,
        'point_price'        =>'0.0',
        'point_le'           =>'0.0',
        'region_id'          =>1,
        'city_id'            =>3,
        'supcategory_id'     =>1,
        'type_of_goods'      =>1,
        'delivery_though'    =>1,
        'minimum_products'   =>2,
        'minimum_financial'  =>'10',
        'deferred_sale'      =>'1',
        'low_profit'         =>'1',
      ]);
    }
}
