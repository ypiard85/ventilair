<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'nom' => 'Wifi',
            'created_at' => now()
        ]);

        DB::table('types')->insert([
            'nom' => 'Déstratificateur d\'air',
            'created_at' => now()
        ]);

        DB::table('types')->insert([
            'nom' => 'Ventilateurs sur pieds',
            'created_at' => now()
        ]);

        DB::table('types')->insert([
            'nom' => 'Ventilateur mural',
            'created_at' => now()
        ]);
    }
}
