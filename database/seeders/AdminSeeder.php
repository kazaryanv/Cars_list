<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name' => "Admin",
            'email' => 'Administrator@mail.ru',
            'role' => '1',
            'password' => '$2y$10$H71mGdDeHwiSz8oReutj0.HIS6qu0Q5EyEjFYfua5GoPuCFaB9LYe',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
