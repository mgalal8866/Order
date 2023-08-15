<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users= [[
            'client_name'        =>'Mohamed',
            'client_Balanc'      =>0,
            'client_points'      =>0,
            'client_fhonewhats'  =>'01024346011',
            'client_EntiteNumber'=>'01024346011',
            'region_id'          =>'3',
            'categoryAPP'        =>'1'
        ]// ,[
        //     'client_name'        =>'Mohamed',
        //     'client_Balanc'      =>0,
        //     'client_points'      =>0,
        //     'client_EntiteNumber'=>'01024346011',
        //     'region_id'          =>'3',
        //     'categoryAPP'        =>'1',
        // ]
    ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
