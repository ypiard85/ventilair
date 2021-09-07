<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promo_produits')->insert([
            'produit_id' => 1,
            'promo_id' => 1,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 2,
            'promo_id' => 1,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 3,
            'promo_id' => 1,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 4,
            'promo_id' => 1,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 5,
            'promo_id' => 2,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 6,
            'promo_id' => 2,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 4,
            'promo_id' => 2,
            'created_at' => now()
        ]);

        DB::table('promo_produits')->insert([
            'produit_id' => 5,
            'promo_id' => 2,
            'created_at' => now()
        ]);
    }
}
