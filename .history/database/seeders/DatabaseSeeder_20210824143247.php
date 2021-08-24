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
        $this->call([RoleSeeder::class]);
        $this->call([PoidsSeeder::class]);
        $this->call([TaillesSeeder::class]);
        $this->call([PromosSeeder::class]);
        $this->call([CategorieSeeder::class]);
        $this->call([TypeSeeder::class]);
        //$this->call([ImageSeeder::class]);
    }
}
