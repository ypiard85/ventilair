<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    private $nom;

    public function __construct($nom){
        $nom = array('fdài', 'ifuury');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('categories')->insert([
            'nom' => 'vr',
        ]);

    }
}
