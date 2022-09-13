<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    DashboardController,
};

// Dashboard routes
Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/prikaz-aktivnosti', [DashboardController::class, 'index_activity'])->name('dashboard-activity');
});






















