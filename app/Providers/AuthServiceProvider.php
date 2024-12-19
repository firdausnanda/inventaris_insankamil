<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Mendefinisikan gate 'viewLogViewer' untuk mengatur akses ke Log Viewer
        // Parameter $user adalah user yang sedang login
        // Saat ini selalu return true yang berarti semua user bisa akses
        // Bisa diubah menjadi $user->hasRole('admin') untuk batasi ke admin saja
        Gate::define('viewLogViewer', function ($user) {
            // Sesuaikan dengan logika authorization Anda
            return true; // atau $user->isAdmin() atau logika lainnya
        });
    }
}
