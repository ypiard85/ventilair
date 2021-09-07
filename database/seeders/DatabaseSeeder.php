<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TypeSeeder;
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
        $this->call([
            RoleSeeder::class,
            PoidsSeeder::class,
            TaillesSeeder::class,
            PromosSeeder::class,
            CategorieSeeder::class,
            TypeSeeder::class,
            ProduitsSeeder::class,
            ImageSeeder::class,
            UsersSeeder::class,
            CommandesSeeder::class,
            CommandeProduitsSeeder::class
        ]);
    }
}
