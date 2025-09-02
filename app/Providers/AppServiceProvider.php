<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);

        RateLimiter::for('giris-yap', function (Request $request) {
            $email = (string) $request->input('email');

            return [
                Limit::perMinute(5)->by($email.'|'.$request->ip())
                    ->response(function () {
                        return response()->json([
                            'message' => 'Çok fazla giriş denemesi. Lütfen biraz sonra tekrar deneyin.'
                        ], 429);
                    }),

                Limit::perMinutes(10, 10)->by('long:'.$email.'|'.$request->ip()),
            ];
        });

        RateLimiter::for('password-reset', function (Request $request) {
            return Limit::perMinutes(10, 3)->by($request->ip());
        });

        RateLimiter::for('kayit-ol', function (Request $request) {
            return Limit::perMinutes(60, 5)->by($request->ip());
        });
    }
}
