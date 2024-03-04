<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionRecords = [
            ['id'=>1,'name'=>'Select all','feature_id'=>1],
            ['id'=>2,'name'=>'Create','feature_id'=>1],
            ['id'=>3,'name'=>'Update','feature_id'=>1],
            ['id'=>4,'name'=>'Delete','feature_id'=>1],
            ['id'=>5,'name'=>'Import','feature_id'=>1],
            ['id'=>6,'name'=>'Export','feature_id'=>1],
            ['id'=>7,'name'=>'Print','feature_id'=>1],
            ['id'=>8,'name'=>'Select all','feature_id'=>2],
            ['id'=>9,'name'=>'Create','feature_id'=>2],
            ['id'=>10,'name'=>'Update','feature_id'=>2],
            ['id'=>11,'name'=>'Delete','feature_id'=>2],
            ['id'=>12,'name'=>'Import','feature_id'=>2],
            ['id'=>13,'name'=>'Export','feature_id'=>2],
            ['id'=>14,'name'=>'Print','feature_id'=>2],
        ];
        Permission::insert($permissionRecords);
    }
}
