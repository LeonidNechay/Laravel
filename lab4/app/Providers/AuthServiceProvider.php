<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Auto;
use App\Models\Dps;
use App\Policies\AutoPolicy;
use App\Policies\DpsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Auto::class => AutoPolicy::class,
        Dps::class => DpsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
