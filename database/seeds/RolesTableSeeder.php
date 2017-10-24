<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      =>  'Admin',
            'display_name'     =>  'Administrator',
            'description'  =>  'Admin role'
        ])->create([
            'name'      =>  'User',
            'display_name'     =>  'User',
            'description'  =>  'User role'
        ])->create([
            'name'      =>  'Staff',
            'display_name'     =>  'Staff',
            'description'  =>  'Staff role'
        ]);
    }
}
