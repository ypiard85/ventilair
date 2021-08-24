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

        $name = ['Ventilateurs plafond', 'Ventilateurs colonne', ];

        for($i = 0; $i < count($name); $i++ ){
            DB::table('categories')->insert([
                'nom' => $name[$i],
                'created_at' => now()
            ]);
        }

    }
}
