<?php

namespace Database\Seeders;


use App\Models\ApiToken;
use App\Models\CateoryApp;
use App\Models\setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [ 'name' => 'سوبر ماركت' , 'cat_active' =>1],
            [ 'name' => 'كشك'        , 'cat_active' =>1],
        ];
        foreach($category as $cat){
            CateoryApp::create($cat);
        }
    }
}
