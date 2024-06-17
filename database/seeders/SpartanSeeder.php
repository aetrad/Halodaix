<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spartan;

class SpartanSeeder extends Seeder {
    public function run() {
        Spartan::create(['name' => 'Master Chief','image' => 'images/linda.jpg', 'pv' => 100, 'weight' => 120.5, 'height' => 2.18]);
        Spartan::create(['name' => 'Spartan Locke','image' => 'images/locke.jpg', 'pv' => 95, 'weight' => 115.3, 'height' => 2.15]);
        Spartan::create(['name' => 'Spartan Kelly','image' => 'images/tanaka.jpg', 'pv' => 90, 'weight' => 110.0, 'height' => 2.10]);
        Spartan::create(['name' => 'Spartan Fred','image' => 'images/carte.jpg', 'pv' => 92, 'weight' => 112.7, 'height' => 2.12]);
        Spartan::create(['name' => 'Spartan Linda','image' => 'images/carte1.jpg', 'pv' => 88, 'weight' => 108.5, 'height' => 2.08]);
        Spartan::create(['name' => '343 Gulty Spark', 'pv' => 85, 'weight' => 106.2, 'height' => 2.05]);
        Spartan::create(['name' => 'Spartan Tanaka', 'pv' => 93, 'weight' => 114.0, 'height' => 2.14]);
        // Ajoutez d'autres spartans ici...
    }
}

