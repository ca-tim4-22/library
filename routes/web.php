<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    DashboardController,
    UserController,
    MailChimpController,
};
use App\Models\Book;

// Dashboard routes
Route::group(['middleware' => 'protect-all'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/prikaz-aktivnosti', [DashboardController::class, 'index_activity'])->name('dashboard-activity');

Route::delete('/izbrisi-svoj-nalog/{id}', [UserController::class, 'destroy'])->name('destroy-yourself');

Route::get('/prijavi-se', [MailChimpController::class, 'index'])->name('subscribe');

Route::get('/faq', function() {
    return view('pages.links.faq', ['count' => Book::count()]);
})->name('faq');

Route::view("/radno-vrijeme", 'pages.links.working_time')->name('working-time');
});























