<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class rolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'cliente']);

        $user1 = User::find(1);
        $user1 -> assignRole('admin');

        $user2 = User::find(2);
        $user2 -> assignRole('cliente');

        Permission::create(['name' => 'buy']);
        Permission::create(['name' => 'taquear']);
        Permission::create(['name' => 'auth']);

        $roleAdmin -> givePermissionTo(Permission::all());
        $roleUser -> givePermissionTo(['buy','auth']);
    }
}