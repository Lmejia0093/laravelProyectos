<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['recepcion', 'bodega', 'supervisor', 'ruteo'];

        foreach ($roles as $rol) {
            Role::firstOrCreate(['name' => $rol]);
        }
    }
}
