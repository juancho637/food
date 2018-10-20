<?php

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suRole = Role::create([
            'name'      => 'super usuario',
            'slug'      => 'su',
            'special'   => 'all-access',
        ]);

        $adminRole = Role::create([
            'name'      => 'administrador',
            'slug'      => 'admin',
        ]);
        $adminRole->syncPermissions([1, 2, 3, 4, 5, 11, 12, 13, 14, 15, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28]);

        $clientRole = Role::create([
            'name'      => 'cliente',
            'slug'      => 'client',
        ]);
        $clientRole->syncPermissions([3, 4, 5, 12, 13, 17, 18, 22, 23, 26, 27, 28, 29, 30]);

        $su = User::create([
            'name' => 'Super Usuario',
            'is_client' => 0,
            'email' => 'su@mail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);

        $su->assignRole($suRole->id);

        factory(\App\User::class, 10)->create()->each(function ($user) use ($clientRole){
            factory(App\Reservation::class, 2)->create([
                'user_id' => $user->id,
            ]);

            $user->assignRole($clientRole->id);
        });
    }
}
