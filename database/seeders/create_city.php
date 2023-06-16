<?php

namespace Database\Seeders;

use App\Models\cities;
use App\Models\region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class create_city extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jsoncity = File::get('public/city/cities.json');
        $city = json_decode($jsoncity);

        foreach ($city as $key => $value) {
            cities::create([
                "city_name_ar" => $value->city_name_ar,
                "city_name_en" => $value->city_name_en,
                "slug" => Str::slug($value->city_name_en),
            ]);
        }
        $jsonregion = File::get('public/city/regions.json');
        $region = json_decode($jsonregion);
        foreach ($region as $key => $value) {
            region::create([
                "city_id" => $value->city_id,
                "region_name_ar" => $value->region_name_ar,
                "region_name_en" => $value->region_name_en,
                "main" => $value->main??false,
                "slug" => Str::slug($value->region_name_en)
            ]);
        }
    }
}
