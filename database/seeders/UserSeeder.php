<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Akun Demo',
            'email' => 'mikozua45@gmail.com',
            'password' => bcrypt('users123'),
            'nomor' => '6285741710084',
        ]);
    }
}
