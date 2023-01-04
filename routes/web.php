<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    DashboardController,
    UserController,
    MailChimpController,
};

use App\Models\ {
    Book,
    GlobalVariable,
};

// Dashboard routes
Route::group(['middleware' => 'protect-all'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/dashboard/prikaz-aktivnosti',
        [DashboardController::class, 'index_activity'])
        ->name('dashboard-activity');

    Route::delete('/izbrisi-svoj-nalog/{id}',
        [UserController::class, 'destroy'])->name('destroy-yourself');

    Route::get('/prijavi-se', [MailChimpController::class, 'index'])
        ->name('subscribe');

    Route::get('/faq', function () {
        return view('pages.links.faq', ['count' => Book::count()]);
    })->name('faq');

    Route::get('/radno-vrijeme', function () {
        return view('pages.links.working_time',
            ['status' => GlobalVariable::where('id', 5)->first()]);
    })->name('working-time');

    Route::view('/spam-prevent', 'maintenance.spam_prevent')
        ->name('spam-prevent');
});




















