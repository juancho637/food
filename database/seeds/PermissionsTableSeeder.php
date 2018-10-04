<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'        => 'Crear usuarios',
            'slug'        => 'users.create',
            'description' => 'Crea un usuario en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar usuarios',
            'slug'        => 'users.index',
            'description' => 'lista todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de los usuarios',
            'slug'        => 'users.show',
            'description' => 'Visualizar detalle de un usuario del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de usuarios',
            'slug'        => 'users.edit',
            'description' => 'Editar datos de un usuario del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar usuari',
            'slug'        => 'users.destroy',
            'description' => 'Eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'        => 'Crear roles',
            'slug'        => 'roles.create',
            'description' => 'Crea un rol en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar roles',
            'slug'        => 'roles.index',
            'description' => 'lista todos los roles del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de los roles',
            'slug'        => 'roles.show',
            'description' => 'Visualizar detalle de un rol del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de roles',
            'slug'        => 'roles.edit',
            'description' => 'Editar datos de un rol del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar rol',
            'slug'        => 'roles.destroy',
            'description' => 'Eliminar cualquier rol del sistema',
        ]);

        //Products
        Permission::create([
            'name'        => 'Crear productos',
            'slug'        => 'products.create',
            'description' => 'Crea un producto en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar productos',
            'slug'        => 'products.index',
            'description' => 'lista todos los productos del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de los productos',
            'slug'        => 'products.show',
            'description' => 'Visualizar detalle de un producto del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de productos',
            'slug'        => 'products.edit',
            'description' => 'Editar datos de un producto del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar rol',
            'slug'        => 'products.destroy',
            'description' => 'Eliminar cualquier producto del sistema',
        ]);
    }
}
