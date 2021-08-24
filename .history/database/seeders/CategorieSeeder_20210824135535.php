<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    private $name = array('Ventilateurs plafond' , 'Déstratificateur d'air');
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->insert([
            'nom' => 'vr'
        ]);

    }
}
