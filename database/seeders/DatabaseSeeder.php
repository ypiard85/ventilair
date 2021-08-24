<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);
        $this->call([PoidsSeeder::class]);
        $this->call([TaillesSeeder::class]);
        $this->call([PromosSeeder::class]);
    }
}
