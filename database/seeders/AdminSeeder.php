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
            'email' => 'Admin@mail.org',
            'role' => '1',
            'password' => '$2y$10$V9ArAre4SJYv3AdbnzOWVOeL5FPqxWGVVkj6Ars8ucy9QdngVoPZi',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
