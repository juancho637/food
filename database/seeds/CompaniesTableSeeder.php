<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Company::class, 5)->create()->each(function ($company){

            factory(App\User::class, 3)->create([
                'company_id' => $company->id,
                'is_client'  => 0,
            ])->each(function ($user){
                $user->assignRole(2);
            });

            factory(App\Branch::class, 2)->create([
                'company_id' => $company->id,
            ])->each(function ($branch){
                factory(App\Product::class, 10)->create([
                    'branch_id' => $branch->id,
                ]);
            });

        });
    }
}
