<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commande_produits')->insert([
            'created_at' => now(),
            'produit_id' => 2,
            'commande_id' => 1,
            'quantite' => 3,
        ]);
        DB::table('commande_produits')->insert([
            'created_at' => now(),
            'produit_id' => 6,
            'commande_id' => 1,
            'quantite' => 6,
        ]);
    }
}
