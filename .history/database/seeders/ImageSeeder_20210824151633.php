<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 60; $i++) {

            DB::table('images')->insert([
                'name' => 'image1',
                'produit_id' => rand(1, 25)
            ]);

            DB::table('images')->insert([
                'name' => 'image2',
                'produit_id' => rand(1, 25)
            ]);

            DB::table('images')->insert([
                'name' => 'image3',
                'produit_id' => rand(1, 25)
            ]);
        }
    }
}
