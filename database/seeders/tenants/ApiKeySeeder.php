<?php

namespace Database\Seeders\Tenants;


use App\Models\ApiToken;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keys = [
            ['name'=>'APP','token'=>'poOLz4qcSBdmbS9X'],
            ['name'=>'Desktop','token'=>'moaKriCSu1KHLZ0oZb'],
            ['name'=>'Postmantest','token'=>'moaKkuusSu1KHLZ0oZb']
        ];
        foreach($keys as $key){
            ApiToken::create($key);
        }
    }
}
