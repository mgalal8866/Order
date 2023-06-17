<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ApiToken;
use Illuminate\Database\Seeder;
use Database\Seeders\settingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            create_city::class,
            settingSeeder::class
        ]);
    }
}
