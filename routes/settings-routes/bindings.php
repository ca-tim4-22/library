<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    BindingController
};

Route::controller(BindingController::class)->group(function() {
Route::get('/podesavanja/novi-povez', [BindingController::class, 'index'])->name('new-binding');
Route::post('/podesavanja/kreiranje-novog-poveza', [BindingController::class, 'store'])->name('store-binding');
Route::delete('/podesavanja/brisanje-poveza/{id}', [BindingController::class, 'destroy'])->name('destroy-binding');
Route::get('/podesavanja/izmijeni-povez/{binding:name}', [BindingController::class, 'edit'])->name('edit-binding');
Route::put('/podesavanja/izmijeni-povez/{id}', [BindingController::class, 'update'])->name('update-binding');
});

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/poveze', [BindingController::class, 'deleteMultiple'])->name('delete-all-bindings');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain publisher through URI
Route::get('/podesavanja/povezi/{id}', function ($id) {});
Route::post('/podesavanja/povezi/{id}', [BindingController::class, 'destroy'])->name('bindings.destroy');
});

?>
