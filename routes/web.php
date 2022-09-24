<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    DashboardController,
    UserController,
};

// Dashboard routes
Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/prikaz-aktivnosti', [DashboardController::class, 'index_activity'])->name('dashboard-activity');

Route::delete('/izbrisi-svoj-nalog/{id}', [UserController::class, 'destroy'])->name('destroy-yourself');
});























