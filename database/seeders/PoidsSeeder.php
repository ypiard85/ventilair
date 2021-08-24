<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PoidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filtres_poids')->insert([
            'intervalle' => '0 à 5',
            'created_at' => now()
        ]);
        DB::table('filtres_poids')->insert([
            'intervalle' => '6 à 10',
            'created_at' => now()
        ]);
        DB::table('filtres_poids')->insert([
            'intervalle' => '11 à 15',
            'created_at' => now()
        ]);
        DB::table('filtres_poids')->insert([
            'intervalle' => '16 et plus',
            'created_at' => now()
        ]);
    }
}
