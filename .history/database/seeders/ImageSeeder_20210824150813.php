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
        DB::table('images')->insert([
            'name' => 'image1',
            'produit_id' => romd()
        ]);

        DB::table('images')->insert([
            'name' => 'image2',
            'produit_id' => 2
        ]);

        DB::table('images')->insert([
            'name' => 'image3',
            'produit_id' => 3
        ]);
    }
}
