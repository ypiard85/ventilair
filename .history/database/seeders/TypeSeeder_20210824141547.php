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
        $name = ['Hyper Silencieux', 'Déstratificateur d\'air'];

        for($i = 0; $i < count($name); $i++ ){
            DB::table('types')->insert([
                'nom' => $name[$i],
                'created_at' => now()
            ]);
        }
    }
}
