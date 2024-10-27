<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mulai dari nomor awal
        $start = 3801000000;
        // Nomor akhir
        $end = 3801005000;

        // Loop dari start ke end
        for ($i = $start; $i <= $end; $i++) {
            DB::table('tags')->insert([
                'number' => sprintf('0038%08d', $i), // Format menjadi nomor dengan awalan 0038
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
