<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('example_data')->insert([
            'id' => '9d5909f3-07fb-4645-bec6-055feb2d0c99',
            'nama' => 'Agung',
            'alamat' => 'Bandung',
            'pekerjaan' => 'PNS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
