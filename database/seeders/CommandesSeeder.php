<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commandes')->insert([
            'created_at' => now(),
            'user_id' => 1,
            'numero' => rand(1000, 99999),
            'prix' => 672,
        ]);
    }
}
