<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Person A',
                'email'=>'person_a@gmail.com',
                'password'=>Hash::make('PasswordA')
            ],
            [
                'name'=>'Person B',
                'email'=>'person_b@gmail.com',
                'password'=>Hash::make('PasswordB')
            ],
        ]);
    }
}
