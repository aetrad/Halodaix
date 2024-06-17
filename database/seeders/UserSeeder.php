<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // On crée un admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        // 10 auteurs
        User::factory(10)->create([
            'role_id' => 2,
        ]);

        // On crée notre utilisateur de test
        User::create([
            'name' => 'User User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);

        // 30 utilisateurs lambda
        User::factory(30)->create([
            'role_id' => 3,
        ]);
    }
}
