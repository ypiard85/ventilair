<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couleurs = array("Vert", "Bleu", "Rouge", "Noir", "Blanc");
        for ($i = 0; $i < 25; $i++) {
            DB::table('produits')->insert([
                'created_at' => now(),
                'nom' => 'Ventilateur' . ($i),
                'description' => Str::random(42),
                'description_courte' => Str::random(120),
                'categorie_id' => rand(1, 4),
                'prix' => rand(10, 2000),
                'stock' => rand(0, 100),
                'note' => rand(1.1 , 9.9),
                'couleur' => $couleurs[array_rand($couleurs, 1)],
                'type_id' => rand(1, 2),
                'taille' => rand(1, 200),
                'poids' => rand(1, 35),
                'filtre_poids_id' => rand(1, 4),
                'filtre_tailles_id' => rand(1, 4),
            ]);
        }
    }
}
