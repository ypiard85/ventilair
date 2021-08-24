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

        $name = ['Ventilateurs plafond', 'Hyper Silencieux', 'Déstratificateur d\'air'];



        for($i = 0; $i < count($name); $i++ ){

            DB::table('categories')->insert([
                'nom' => 'vr',
            ]);
        }

    }
}
