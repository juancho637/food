<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\User;
use App\Branch;
use App\Product;
use App\Client;
use App\Reservation;
use Caffeinated\Shinobi\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //Permission::trucate();
        Company::truncate();
        User::truncate();
        Branch::truncate();
        Product::truncate();
        Client::truncate();
        Reservation::truncate();

        Permission::flushEventListeners();
        Company::flushEventListeners();
        User::flushEventListeners();
        Branch::flushEventListeners();
        Product::flushEventListeners();
        Client::flushEventListeners();
        Reservation::flushEventListeners();

        $this->call(PermissionsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
