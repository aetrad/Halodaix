<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SpartanSeeder::class,
            TypeSeeder::class,
            AttackSeeder::class,
        ]);
    }
}

