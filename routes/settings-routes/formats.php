<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    FormatController
};

Route::controller(FormatController::class)->group(function() {
Route::get('/podesavanja/novi-format', [FormatController::class, 'index'])->name('new-format');
Route::post('/podesavanja/kreiranje-novog-formata', [FormatController::class, 'store'])->name('store-format');
Route::delete('/podesavanja/brisanje-formata/{id}', [FormatController::class, 'destroy'])->name('destroy-format');
Route::get('/podesavanja/izmijeni-format/{format:name}', [FormatController::class, 'edit'])->name('edit-format');
Route::put('/podesavanja/izmijeni-format/{id}', [FormatController::class, 'update'])->name('update-format');
});

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/formate', [FormatController::class, 'deleteMultiple'])->name('delete-all-formats');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain format through URI
Route::get('/podesavanja/formati/{id}', function ($id) {});
Route::post('/podesavanja/formati/{id}', [FormatController::class, 'destroy'])->name('formats.destroy');
});

?>
