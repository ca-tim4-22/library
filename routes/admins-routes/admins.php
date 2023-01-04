<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AdminController,
};

Route::controller(AdminController::class)->group(function () {
// Administrators
    Route::get('/administratori', 'index')->name('all-admin');
    Route::get('/administrator/{user:username}', 'show')->name('show-admin');
    Route::get('/novi-administrator', 'create')->name('new-admin');
    Route::post('/novi-administrator', 'store')->name('store-admin');
    Route::get('/izmijeni-profil-administratora/{user:username}', 'edit')
        ->name('edit-admin');
    Route::put('/izmijeni-profil-administratora/{id}', 'update')
        ->name('update-admin');

// Delete ownself
    Route::delete('/izbrisi-administratora/{id}', 'destroy')
        ->name('destroy-admin');

// For multiple student delete
    Route::delete('izbrisi-sve/administratore', 'deleteMultiple')
        ->name('delete-all-admins');

// Middleware protection
    Route::middleware('user-delete')->group(function () {
// Protection for deleting a certain administrator through URI
        Route::get('/administratori/{id}', function ($id) {
        });
        Route::post('/administratori/{id}', 'destroy')->name('admins.destroy');
    });

    Route::post('/crop/admin', 'crop')->name('admin.crop');
});

?>
