<?php

namespace App\Providers;

use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;
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
        //
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
        if (Schema::hasTable('rents')) {
        $rents2 = Rent::whereDate('issue_date', today())->get();
        $notifications = $rents2->count();
        } else {
            $notifications = 0;
        }
       
        view()->share('notifications', $notifications);

          /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
    }
}
