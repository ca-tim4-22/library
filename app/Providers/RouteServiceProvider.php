<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // Custom path to -> /dashboard
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->group(base_path('routes/librarians-routes/librarians.php'));

            Route::middleware('web')
                ->group(base_path('routes/students-routes/students.php'));

            Route::middleware('web')
                ->group(base_path('routes/admins-routes/admins.php'));

            Route::middleware('web')
                ->group(base_path('routes/authors-routes/authors.php'));

            Route::middleware('web')
                ->group(base_path('routes/books-routes/books.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/bindings.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/categories.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/formats.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/genres.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/letters.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/policies.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/publishers.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/extra.php'));

            Route::middleware('web')
                ->group(base_path('routes/books-routes/books.php'));

            Route::middleware('web')
                ->group(base_path('routes/settings-routes/settings-index.php'));

            Route::middleware('web')
                ->group(base_path('routes/server-routes/server.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id
                ?: $request->ip());
        });
    }
}
