<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AdminController,
};

Route::controller(AdminController::class)->group(function() {
// Admins
Route::get('/administrator', [AdminController::class, 'index'])->name('all-admin');
Route::get('/administrator/{user:username}', [AdminController::class, 'show'])->name('show-admin');

// Delete ownself
Route::delete('/izbrisi-admina/{id}', [AdminController::class, 'destroy'])->name('destroy-admin');
});

Route::post('/crop/admin', [AdminController::class, 'crop'])->name('admin.crop');


?>
