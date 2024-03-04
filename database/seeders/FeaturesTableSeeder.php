<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $featureRecord = [
            ['id'=>1,'name'=>'Users'],
            ['id'=>2,'name'=>'Roles'],
        ];
        Feature::insert($featureRecord);
    }
}
