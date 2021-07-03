<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleK = Role::create(['name' => 'Kaprodi']);
        $roleSU = Role::create(['name' => 'Super User']);

        $permissionManageUser = Permission::create(['name' => 'view-user']);
        $permissionEditUser = Permission::create(['name' => 'edit-user']);
        $permissionDeleteUser = Permission::create(['name' => 'delete-user']);
        $permissionCreateUser = Permission::create(['name' => 'create-user']);

        $permissionInputKualitasMahasiswa = Permission::create(['name' => 'view-input-kualitas-mhs']);
        $permissionCreateInputKM = Permission::create(['name' => 'create-input-kualitas-mhs']);
        $permissionEditInputKM = Permission::create(['name' => 'edit-input-kualitas-mhs']);
        $permissionDeleteInputKM = Permission::create(['name' => 'delete-input-kualitas-mhs']);

        $roleK->syncPermissions([
           $permissionInputKualitasMahasiswa,
           $permissionCreateInputKM,
           $permissionEditInputKM,
           $permissionDeleteInputKM
        ]);

        $roleSU->syncPermissions([
            $permissionManageUser,
            $permissionCreateUser,
            $permissionEditUser,
            $permissionDeleteUser,

            $permissionInputKualitasMahasiswa,
            $permissionCreateInputKM,
            $permissionEditInputKM,
            $permissionDeleteInputKM
        ]);
    }
}
