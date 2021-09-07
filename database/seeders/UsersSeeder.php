<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'pseudo' => 'admin',
            'nom' => 'Georges',
            'prenom' => 'Kyle',
            'email' => 'jason@ignis.fr',
            'password' => Hash::make('12345'),
            'role_id' => 2,
            'created_at' => now()
        ]);
    }
}
