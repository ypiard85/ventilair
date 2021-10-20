<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filtretailles')->insert([
            'intervalle' => '0 à 39',
            'created_at' => now()
        ]);
        DB::table('filtretailles')->insert([
            'intervalle' => '40 à 69',
            'created_at' => now()
        ]);
        DB::table('filtretailles')->insert([
            'intervalle' => '70 à 149',
            'created_at' => now()
        ]);
        DB::table('filtretailles')->insert([
            'intervalle' => '149 et plus',
            'created_at' => now()
        ]);
    }
}
