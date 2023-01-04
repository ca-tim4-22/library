<?php

namespace App\Providers;

use App\Models\Rent;
use App\Models\ReservationStatuses;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Localization Carbon
        Carbon::setLocale('sr');

        /*
        Disclaimer
        While using the local version of the app, we have turned off the number of notifications due to displaying warnings during installation of composer install/update
        */

        // Notifications
        if (\Config::get('values.stage') == 'local') {
            $notifications = 0;
        } else {
            $rents_c = Rent::all();
            $reservations_c = ReservationStatuses::all();
            if (count($rents_c) > 0 && count($reservations_c) > 0) {
                $rents = Rent::whereDate('issue_date', today())->get();
                $reservation = ReservationStatuses::whereDate('created_at',
                    today())->where('status_reservations_id', 1)->get();
                $notifications = $rents->count() + $reservation->count();
            } else {
                $notifications = 0;
            }
        }

        // Remove 'data' wrapping -> API
        JsonResource::withoutWrapping();

        // Shareable variable to all  views
        view()->share('notifications', $notifications);
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param  int  $perPage
         * @param  int  $total
         * @param  int  $page
         * @param  string  $pageName
         *
         * @return array
         */
    }
}
