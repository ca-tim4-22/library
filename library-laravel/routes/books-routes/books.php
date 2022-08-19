<?php

use App\Http\Controllers\ {
    BookController,
};

use App\Http\Controllers\Books\ {
    RentBook,
};

use Illuminate\Support\Facades\ {
    Route,
};

Route::controller(BookController::class)->group(function(){
// Books
Route::get('/knjige', [BookController::class, 'index'])->name('all-books');
Route::get('/knjiga/{id}', [BookController::class, 'show'])->name('show-book');
Route::get('/nova-knjiga', [BookController::class, 'create'])->name('new-book');
Route::post('/nova-knjiga', [BookController::class, 'store'])->name('store-book');
Route::get('/izmijeni-knjigu/{id}', [BookController::class, 'edit'])->name('edit-book');
Route::put('/izmijeni-knjigu/{id}', [BookController::class, 'update'])->name('update-book');
Route::delete('/izbrisi-knjigu/{id}', [BookController::class, 'destroy'])->name('destroy-book');

Route::get('/aktivne-rezervacije', [BookController::class, 'activeReservations'])->name('active-books');
Route::get('/arhivirane-knjige', [BookController::class, 'archivedReservations'])->name('archived-books');
Route::get('/knjige-u-prekoracenju', [BookController::class, 'overdueBooks'])->name('overdue-books');
Route::get('/vracene-knjige', [BookController::class, 'returnedBooks'])->name('returned-books');

});

Route::controller(RentBook::class)->group(function(){
// Rented books
Route::get('/izdate-knjige', [RentBook::class, 'index'])->name('rented-books');
Route::get('izdaj-knjigu/{id}',[RentBook::class, 'create'])->name('rent-book');
Route::post('izdaj-knjigu/{id}',[RentBook::class, 'store'])->name('store-rent-book');
});

?>
