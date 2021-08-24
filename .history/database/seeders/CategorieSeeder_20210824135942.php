<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    private $nom;

    public function __construct($nom){
        $this->nom = $nom;
    }

    $nom = ['']

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
