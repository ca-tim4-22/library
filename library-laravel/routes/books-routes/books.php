<?php

use App\Http\Controllers\ {
    BookController,
};

use App\Http\Controllers\Books\ {
    RentBookController,
    ReturnBookController
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
Route::get('/arhivirane-rezervacije', [BookController::class, 'archivedReservations'])->name('archived-books');
Route::get('/knjige-u-prekoracenju', [BookController::class, 'overdueBooks'])->name('overdue-books');
Route::get('/vracene-knjige', [BookController::class, 'returnedBooks'])->name('returned-books');

});

Route::controller(RentBookController::class)->group(function(){
// Rented books
Route::get('/detalji-izdavanja-knjige/{id}', [ReturnBookController::class, 'show'])->name('rented-info');
Route::get('/izdate-knjige', [RentBookController::class, 'index'])->name('rented-books');
Route::get('izdaj-knjigu/{id}',[RentBookController::class, 'create'])->name('rent-book');
Route::post('izdaj-knjigu/{id}',[RentBookController::class, 'store'])->name('store-rent-book');
});

Route::controller(ReturnBookController::class)->group(function(){
// Return book
Route::get('/detalji-vracanja-knjige/{id}', [ReturnBookController::class, 'show'])->name('returned-info');
Route::get('/vracene-knjige', [ReturnBookController::class, 'index'])->name('returned-books');
Route::get('/vrati-knjigu/{id}', [ReturnBookController::class, 'create'])->name('return-book');
Route::post('/vrati-knjigu/{id}', [ReturnBookController::class, 'store'])->name('store-return-book');
});

?>
