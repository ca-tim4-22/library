<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AdminController,
};

Route::controller(AdminController::class)->group(function() {
// Admins
Route::get('/administratori', [AdminController::class, 'index'])->name('all-admin');
Route::get('/administrator/{user:username}', [AdminController::class, 'show'])->name('show-admin');
Route::get('/novi-administrator', [AdminController::class, 'create'])->name('new-admin');
Route::post('/novi-administrator', [AdminController::class, 'store'])->name('store-admin');
Route::get('/izmijeni-profil-administratora/{user:username}', [AdminController::class, 'edit'])->name('edit-admin');
Route::put('/izmijeni-profil-administratora/{id}', [AdminController::class, 'update'])->name('update-admin');

// Delete ownself
Route::delete('/izbrisi-admina/{id}', [AdminController::class, 'destroy'])->name('destroy-admin');
});

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain student through URI
Route::get('/admins/{id}', function ($id) {});
Route::post('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
});

Route::post('/crop/admin', [AdminController::class, 'crop'])->name('admin.crop');


?>
