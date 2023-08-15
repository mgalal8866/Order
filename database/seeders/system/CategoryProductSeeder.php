<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CateoryApp;
use App\Models\SupCategory;
use Illuminate\Database\Seeder;
class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [ 'category_name' => 'مجموعة عامة '],
            [ 'parent_id'=>1 ,'category_name' => 'البان'  ],
            [ 'parent_id'=>1 ,'category_name' => 'بقوليات'],
            [ 'parent_id'=>1 ,'category_name' => 'اسماك'  ],
            [ 'parent_id'=>1 ,'category_name' => 'خضار'   ],
            [ 'parent_id'=>1 ,'category_name' => 'مجمدات' ],
            [ 'parent_id'=>1 ,'category_name' => 'عطارة'  ],
            [ 'parent_id'=>1 ,'category_name' => 'مشروبات'],
            [ 'parent_id'=>1 ,'category_name' => 'منظفات' ],
            [ 'parent_id'=>1 ,'category_name' => 'سناكس'  ],
        ];
        foreach($category as $cat){
            Category::create($cat);
        }
    }
}
