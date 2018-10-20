<?php

namespace App\Providers;

use App\Branch;
use App\Company;
use App\Policies\BranchPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ReservationPolicy;
use App\Policies\UserPolicy;
use App\Product;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class         => UserPolicy::class,
        Branch::class       => BranchPolicy::class,
        Company::class      => CompanyPolicy::class,
        Product::class      => ProductPolicy::class,
        Reservation::class  => ReservationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addMinutes(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
