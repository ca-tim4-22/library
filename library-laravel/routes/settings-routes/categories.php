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
Route::get('/podesavanja/izmijeni-kategoriju/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::put('/podesavanja/izmijeni-kategoriju/{id}', [CategoryController::class, 'update'])->name('update-category');
Route::post('/podesavanja/kategorije', [CategoryController::class, 'search'])->name('search-category');
});

?>
