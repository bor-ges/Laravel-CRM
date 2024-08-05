<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Yajra\Acl\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'cliente', 'slug' => 'cliente']);
        Role::create(['name' => 'consultor', 'slug' => 'consultor']);
        Role::create(['name' => 'gerente', 'slug' => 'gerente']);
        Role::create(['name' => 'administrador', 'slug' => 'administrador']);
    }
}
