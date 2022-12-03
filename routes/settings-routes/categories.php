<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    CategoryController
};

Route::controller(CategoryController::class)->group(function() {
Route::get('/podesavanja/nova-kategorija', 'index')->name('new-category');
Route::post('/podesavanja/kreiranje-nove-kategorije', 'store')->name('store-category');
Route::delete('/podesavanja/brisanje-kategorije/{id}', 'destroy')->name('destroy-category');
Route::get('/podesavanja/izmijeni-kategoriju/{category:name}', 'edit')->name('edit-category');
Route::put('/podesavanja/izmijeni-kategoriju/{id}', 'update')->name('update-category');

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/kategorije', 'deleteMultiple')->name('delete-all-categories');

// Middleware protection
Route::middleware('user-delete')->group(function() {
    // Protection for deleting a certain category through URI
    Route::get('/podesavanja/kategorije/{id}', function ($id) {});
    Route::post('/podesavanja/kategorije/{id}', 'destroy')->name('categories.destroy');
});
});

?>
