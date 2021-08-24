<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CategorieSeeder;

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
        $this->call([CategorieSeeder::class]);
        $this->call([ImageSeeder::class]);
    }
}
