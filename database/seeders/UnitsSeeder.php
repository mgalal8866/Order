<?php

namespace Database\Seeders;
use App\Models\unit;
use Illuminate\Database\Seeder;
class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['unit_name' => 'ميزان' ],
            ['unit_name' => 'قطعة'  ],
            ['unit_name' => 'علبة'  ],
            ['unit_name' => 'كرتونة'],
            ['unit_name' => 'لتر'   ],
            ['unit_name' => 'شرينك' ],
            ['unit_name' => 'بلتة'  ],
            ['unit_name' => 'باكو'  ],
        ];
        foreach($units as $unit){
            unit::create($unit);
        }
    }
}
