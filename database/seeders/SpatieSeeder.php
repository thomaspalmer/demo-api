<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();

        Permission::create(['name' => 'users.view']);
        Permission::create(['name' => 'dummy.scope']);

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'user'])->givePermissionTo('dummy.scope');
    }
}
