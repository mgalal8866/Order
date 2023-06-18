<?php

namespace Database\Seeders;
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
            [ 'sup_name' => 'مجموعة عامة '], 
            [ 'parent_id'=>1 ,'sup_name' => 'البان'  ],
            [ 'parent_id'=>1 ,'sup_name' => 'بقوليات'],
            [ 'parent_id'=>1 ,'sup_name' => 'اسماك'  ],
            [ 'parent_id'=>1 ,'sup_name' => 'خضار'   ],
            [ 'parent_id'=>1 ,'sup_name' => 'مجمدات' ],
            [ 'parent_id'=>1 ,'sup_name' => 'عطارة'  ],
            [ 'parent_id'=>1 ,'sup_name' => 'مشروبات'],
            [ 'parent_id'=>1 ,'sup_name' => 'منظفات' ],
            [ 'parent_id'=>1 ,'sup_name' => 'سناكس'  ],
        ];
        foreach($category as $cat){
            SupCategory::create($cat);
        }
    }
}
