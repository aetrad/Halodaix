<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attack;

class AttackSeeder extends Seeder {
    public function run() {
        Attack::create(['name' => 'Energy Sword', 'damage' => 75, 'description' => 'A deadly close-range weapon.', 'type_id' => 1]);
        Attack::create(['name' => 'Plasma Rifle', 'damage' => 55, 'description' => 'A rapid-fire plasma weapon.', 'type_id' => 1]);
        Attack::create(['name' => 'Needler', 'damage' => 65, 'description' => 'A weapon that fires homing needles.', 'type_id' => 1]);
        Attack::create(['name' => 'Assault Rifle', 'damage' => 50, 'description' => 'A standard-issue rifle for UNSC forces.', 'type_id' => 2]);
        Attack::create(['name' => 'Spartan Laser', 'damage' => 90, 'description' => 'A powerful laser weapon.', 'type_id' => 2]);
        Attack::create(['name' => 'Binary Rifle', 'damage' => 80, 'description' => 'A Forerunner sniper weapon.', 'type_id' => 3]);
        Attack::create(['name' => 'Incineration Cannon', 'damage' => 85, 'description' => 'A Forerunner weapon that fires explosive rounds.', 'type_id' => 3]);
    }
}
