<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder {
    public function run() {
        Type::create(['name' => 'Covenant', 'color' => 'purple']);
        Type::create(['name' => 'UNSC', 'color' => 'green']);
        Type::create(['name' => 'Forerunner', 'color' => 'blue']);
        Type::create(['name' => 'Flood', 'color' => 'yellow']);
        Type::create(['name' => 'Promethean', 'color' => 'orange']);
        Type::create(['name' => 'Banished', 'color' => 'red']);
        Type::create(['name' => 'Sentinel', 'color' => 'silver']);
        // Ajoutez d'autres types ici...
    }
}

