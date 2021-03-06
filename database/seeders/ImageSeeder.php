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
        for ($i = 0; $i < 25; $i++) {
            DB::table('images')->insert([
                'name' => 'image' . rand(1, 4) . '.jpg',
                'produit_id' => $i + 1,
            ]);
        }
    }
}
