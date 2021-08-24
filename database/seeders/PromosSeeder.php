<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PromosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->insert([
            'nom' => 'Automne 2021',
            'date_debut' => '2021-10-01',
            'date_fin' => '2021-11-03',
            'reduction' => '20',
            'created_at' => now()
        ]);

        DB::table('promos')->insert([
            'nom' => 'Noël 2021',
            'date_debut' => '2021-11-20',
            'date_fin' => '2021-12-22',
            'reduction' => '30',
            'created_at' => now()
        ]);
    }
}
