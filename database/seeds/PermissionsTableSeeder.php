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
            'name'        => 'Eliminar usuario',
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
            'name'        => 'Eliminar producto',
            'slug'        => 'products.destroy',
            'description' => 'Eliminar cualquier producto del sistema',
        ]);

        //Companies
        Permission::create([
            'name'        => 'Crear empresas',
            'slug'        => 'companies.create',
            'description' => 'Crea una empresa en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar empresas',
            'slug'        => 'companies.index',
            'description' => 'lista todos los empresas del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de las empresas',
            'slug'        => 'companies.show',
            'description' => 'Visualizar detalle de una empresa del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de empresas',
            'slug'        => 'companies.edit',
            'description' => 'Editar datos de una empresa del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar empresa',
            'slug'        => 'companies.destroy',
            'description' => 'Eliminar cualquier empresa del sistema',
        ]);

        //Branches
        Permission::create([
            'name'        => 'Crear sucursales',
            'slug'        => 'branches.create',
            'description' => 'Crea una sucursal en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar sucursales',
            'slug'        => 'branches.index',
            'description' => 'lista todos las sucursales del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de las sucursales',
            'slug'        => 'branches.show',
            'description' => 'Visualizar detalle de una sucursal del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de sucursales',
            'slug'        => 'branches.edit',
            'description' => 'Editar datos de una sucursal del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar sucursal',
            'slug'        => 'branches.destroy',
            'description' => 'Eliminar cualquier sucursal del sistema',
        ]);

        //Reservations
        Permission::create([
            'name'        => 'Crear reservaciones',
            'slug'        => 'reservations.create',
            'description' => 'Crea una reservación en el sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar reservaciones',
            'slug'        => 'reservations.index',
            'description' => 'lista todos las reservaciones del sistema',
        ]);
        Permission::create([
            'name'        => 'Visualizar detalle de las reservaciones',
            'slug'        => 'reservations.show',
            'description' => 'Visualizar detalle de una reservación del sistema',
        ]);
        Permission::create([
            'name'        => 'Edición de reservaciones',
            'slug'        => 'reservations.edit',
            'description' => 'Editar datos de una reservación del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar reservación',
            'slug'        => 'reservations.destroy',
            'description' => 'Eliminar cualquier reservación del sistema',
        ]);
    }
}
