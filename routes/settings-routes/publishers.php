<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    PublisherController
};

Route::controller(PublisherController::class)->group(function() {
Route::get('/podesavanja/novi-izdavac', 'index')->name('new-publisher');
Route::post('/podesavanja/kreiranje-novog-izdavaca', 'store')->name('store-publisher');
Route::delete('/podesavanja/brisanje-izdavaca/{id}', 'destroy')->name('destroy-publisher');
Route::get('/podesavanja/izmijeni-izdavaca/{publisher:name}', 'edit')->name('edit-publisher');
Route::put('/podesavanja/izmijeni-izdavaca/{id}', 'update')->name('update-publisher'); 

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/izdavace', 'deleteMultiple')->name('delete-all-publishers');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain publisher through URI
Route::get('/podesavanja/izdavaci/{id}', function ($id) {});
Route::post('/podesavanja/izdavaci/{id}', 'destroy')->name('publishers.destroy');
});
});

?>
