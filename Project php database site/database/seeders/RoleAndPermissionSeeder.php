<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cashed roles and permissions
        //app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCashedPermissions();

        //perms genre crud
        Permission::create(['name' => 'index Genre']);
        Permission::create(['name' => 'show Genre']);
        Permission::create(['name' => 'create Genre']);
        Permission::create(['name' => 'edit Genre']);
        Permission::create(['name' => 'delete Genre']);
        //perms movie crud
        Permission::create(['name' => 'index Movie']);
        Permission::create(['name' => 'show Movie']);
        Permission::create(['name' => 'create Movie']);
        Permission::create(['name' => 'edit Movie']);
        Permission::create(['name' => 'delete Movie']);

        // customer role
        $customer = Role::create(['name' => 'customer']);

        //sales role
        $sales = Role::create(['name' => 'sales'])
            ->givePermissionTo([
                'index Genre', 'show Genre', 'create Genre', 'edit Genre',
                'index Movie', 'show Movie', 'create Movie', 'edit Movie']);


        //admin Role
        $admin = Role::create(['name'=>'admin'])
            ->givePermissionTo(Permission::all());
    }
}
