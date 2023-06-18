<?php

namespace Database\Seeders;

use App\Models\ProductDetails;
use App\Models\ProductHeader;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [[
            'product_name'        => 'بسكوت شعمدان',
            'product_category'      => 10,
            'product_limit'       => 1,
        ], [
            'product_name'        => ' بيبسي',
            'product_category'      => 8,
            'product_limit'       => 2,
        ]];
        $productsD = [[
            'product_id'          => 1,
            'productd_size'       => 1,//كميه الوحدة
            'productd_unit_id'    => 2,//اسم الوحدة
            'productd_UnitType'   => 1 //ترتيب الوحدة
        ], [
            'product_id'          => 1,
            'productd_size'       => 6,
            'productd_unit_id'    => 3,
            'productd_UnitType'   => 2,
        ], [
            'product_id'          => 1,
            'productd_size'       => 12,
            'productd_unit_id'    => 4,
            'productd_UnitType'   => 3,
        ], [
            'product_id'          => 2,
            'productd_size'       => 1,
            'productd_unit_id'    => 2,
            'productd_UnitType'   => 1,
        ], [
            'product_id'          => 2,
            'productd_size'       => 6,
            'productd_unit_id'    => 6,
            'productd_UnitType'   => 2
        ]];
        foreach ($products as $product) {
            $prod =   ProductHeader::create($product);
            foreach ($productsD as $D) {
                if ($D['product_id'] == $prod->id) {
                    ProductDetails::create($D);
                }
            }
        }
    }
}
