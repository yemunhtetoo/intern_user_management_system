<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('yemun123');
        $adminRecords = [
            [
                'id'=>2,'name'=>'Royal Hinthar','username'=>'royalhinthar','role_id'=>2,'phone'=>'095010975','email'=>'royalhinthar@gmail.com','address'=>'No4, Sanchaung Street','password'=>$password,'gender'=>'1','status'=>1,
            ]
        ];
        Admin::insert($adminRecords);
    }
}
