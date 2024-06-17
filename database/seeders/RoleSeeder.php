<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => Role::ADMIN]);
        Role::create(['name' => Role::AUTHOR]);
        Role::create(['name' => Role::USER]);
    }
}

