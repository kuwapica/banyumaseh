<?php

namespace App\Providers;

use App\Models\Pesanan;
use App\Policies\PesananPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Pesanan::class => PesananPolicy::class,
        // Add other model-policy mappings here as needed
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define additional gates/policies here if needed
        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}