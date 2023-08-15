<?php

namespace Database\Seeders\tenants;
use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
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
