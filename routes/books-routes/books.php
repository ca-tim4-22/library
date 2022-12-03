<?php

use App\Http\Controllers\ {
    BookController,
};

use App\Http\Controllers\Books\ {
    OverdueBookController,
    RentBookController,
    ReturnBookController,
    ActiveReservationController,
    ArchivedReservationController,
    ReserveBookController,
    WriteOffController,
    ArchiveBookController,
};

use Illuminate\Support\Facades\ {
    Route,
};

Route::controller(BookController::class)->group(function(){
// Books
Route::get('/knjige', 'index')->name('all-books');
Route::get('/knjiga/{book:title}', 'show')->name('show-book');
Route::get('/nova-knjiga', 'create')->name('new-book');
Route::post('/nova-knjiga', 'store')->name('store-book');
Route::get('/izmijeni-knjigu/{book:title}', 'edit')->name('edit-book');
Route::put('/izmijeni-knjigu/{id}', 'update')->name('update-book');
Route::delete('/izbrisi-knjigu/{id}', 'destroy')->name('destroy-book');

Route::delete('izbrisi-fotografiju-knjige/{id}', 'destroyBookPhoto')->name('delete-book-photo');
});

Route::controller(RentBookController::class)->group(function(){
// Rented books
Route::get('/detalji-izdavanja-knjige/{id}', 'show')->name('rented-info');
Route::get('/izdate-knjige', 'index')->name('rented-books');
Route::get('izdaj-knjigu/{book:title}', 'create')->name('rent-book');
Route::post('izdaj-knjigu/{id}', 'store')->name('store-rent-book');
Route::delete('izbrisi-izdatu-knjigu/{id}', 'destroy')->name('destroy-rent-book');
});

Route::controller(ReturnBookController::class)->group(function(){
// Returned books
Route::get('/detalji-vracanja-knjige/{id}', 'show')->name('returned-info');
Route::get('/vracene-knjige', 'index')->name('returned-books');
Route::get('/vrati-knjigu/{book:title}', 'create')->name('return-book');
Route::post('/vrati-knjigu', 'store')->name('store-return-book');
});

Route::controller(ReserveBookController::class)->group(function(){
// Reserve a book
Route::get('/rezervisi-knjigu/{book:title}', 'create')->name('reserve-book');
Route::post('/rezervisi-knjigu/{id}', 'store')->name('store-reserve-book');
});

Route::controller(OverdueBookController::class)->group(function(){
// Overdue books
Route::get('/knjige-u-prekoracenju', 'index')->name('overdue-books');
});

Route::controller(WriteOffController::class)->group(function(){
// Write off a book
Route::get('/otpisi-knjigu/{book:title}', 'index')->name('write-off');
Route::post('/otpisi-knjigu/{id}', 'update')->name('update-write-off');
});

Route::controller(ArchivedReservationController::class)->group(function(){
// Archived books
Route::get('/arhivirane-rezervacije', 'index')->name('archived-reservations');
});

Route::controller(ArchiveBookController::class)->group(function(){
// Archive a book
Route::get('/arhiviraj-rezervaciju/{id}', 'index')->name('archive-reservation');
Route::put('/arhiviraj-rezervaciju/{id}', 'update')->name('update-archive-reservation');
});

Route::controller(ActiveReservationController::class)->group(function(){
// Active reservations
Route::get('/aktivne-rezervacije', 'index')->name('active-reservations');
Route::get('/detalji-rezervacije-knjige/{id}', 'show')->name('reserved-info');
// Middleware protection
Route::middleware('reservation-approval')->group(function() {
Route::get('/potvrdi-rezervaciju/{id}', function ($id) {});
Route::get('/odbij-rezervaciju/{id}', function ($id) {});
Route::put('/potvrdi-rezervaciju/{id}', 'approve')->name('approve');
Route::put('/odbij-rezervaciju/{id}', 'deny')->name('deny');
});
});

// Additional features

// For multiple book delete
Route::delete('izbrisi-sve/knjige', [BookController::class, 'deleteMultiple'])->name('delete-all-books');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain book through URI
Route::get('/knjige/{id}', function ($id) {});
Route::post('/knjige/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

?>
