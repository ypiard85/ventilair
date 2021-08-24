<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array('Ventilateurs plafond' , 'Déstratificateur d'air');


        DB::table('categories')->insert([
            'nom' => 'vr'
        ]);

    }
}
