<?php

namespace Database\Seeders;


use App\Models\ApiToken;
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
        ApiToken::create(['name'=>'APP','token'=>'poOLz4qcSBdmbS9X']);
        ApiToken::create(['name'=>'Desktop','token'=>'moaKriCSu1KHLZ0oZb']);
    }
}
