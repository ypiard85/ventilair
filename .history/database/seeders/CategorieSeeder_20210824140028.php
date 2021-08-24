<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public $nom;

    public function __construct($nom){
        $this->nom = $nom;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = ['one', 'two'];


        DB::table('categories')->insert([
            'nom' => 'vr',
        ]);

    }
}
