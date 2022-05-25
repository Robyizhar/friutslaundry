<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Master\Menu;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
use DB;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete semua data user, role, permission
        // DB::table('menus')->delete();
        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('role_has_permissions')->delete();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $index_menus = 0;
        $menus = [
            'infogram',
            'customer-service',
            'kasir',
            'quality-control',
            'cuci',
            'pengeringan',
            'setrika',
            'expedisi',
            'laporan',
            'master-data',
            'member'
        ];

        // buat permission
        do {
            Permission::create([
                'name' => $menus[$index_menus]
            ]);
            $index_menus++;
        } while ($index_menus < sizeOf($menus));

        // buat role
        $owner = Role::create(['name' => 'Owner']);
        $owner->givePermissionTo(Permission::all());
        $dev = Role::create(['name' => 'Maintener']);
        $dev->givePermissionTo(Permission::all());

        // buat user

        $user = \App\Models\User::factory()->create([
            'id' => 1,
            'name' => 'Maintener',
            'email' => 'maintener@example.com',
            'password' => Hash::make('asdw1234'),
            'qr_code' => Hash::make('asdw1234')
        ]);
        $user->assignRole($dev);

        $user = \App\Models\User::factory()->create([
            'id' => 2,
            'name' => 'Owner',
            'email' => 'owner@fruitslaundry.com',
            'password' => Hash::make('admin1234'),
            'qr_code' => Hash::make('admin1234')
        ]);
        $user->assignRole($owner);

    }
}
