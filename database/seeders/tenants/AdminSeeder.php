<?php
namespace Database\Seeders\Tenants;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAdmin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users= [[
            'username'  =>'admin',
            'password'  =>'admin1234',
        ]
    ];
        foreach($users as $user){
            UserAdmin::create($user);
        }
    }
}
