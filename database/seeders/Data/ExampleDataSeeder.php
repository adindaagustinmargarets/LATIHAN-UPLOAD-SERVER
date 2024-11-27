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
            'id' => '1',
            'nama' => 'Agung',
            'alamat' => 'Bandung',
            'pekerjaan' => 'PNS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
