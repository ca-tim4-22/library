<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    CategoryController
};

Route::controller(CategoryController::class)->group(function() {
Route::get('/podesavanja/nova-kategorija', [CategoryController::class, 'index'])->name('new-category');
Route::post('/podesavanja/kreiranje-nove-kategorije', [CategoryController::class, 'store'])->name('store-category');
Route::delete('/podesavanja/brisanje-kategorije/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');
Route::get('/podesavanja/izmijeni-kategoriju/{category:name}', [CategoryController::class, 'edit'])->name('edit-category');
Route::put('/podesavanja/izmijeni-kategoriju/{id}', [CategoryController::class, 'update'])->name('update-category');
});

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/kategorije', [CategoryController::class, 'deleteMultiple'])->name('delete-all-categories');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain category through URI
Route::get('/podesavanja/kategorije/{id}', function ($id) {});
Route::post('/podesavanja/kategorije/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

?>
