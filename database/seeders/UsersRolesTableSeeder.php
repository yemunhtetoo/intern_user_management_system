<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleRecords = [
            
            [
                'id'=>2,'name'=>'Store Keeper',
            ],
            
        ];
        Role::insert($roleRecords);
    }
}
