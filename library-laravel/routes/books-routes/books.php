<?php

use App\Http\Controllers\ {
    BookController,
};

use App\Http\Controllers\Books\ {
    OverdueBookController,
    RentBookController,
    ReturnBookController,
    ActiveReservationController,
    ReserveBookController,
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
Route::get('/arhivirane-rezervacije', [BookController::class, 'archivedReservations'])->name('archived-books');
});

Route::controller(RentBookController::class)->group(function(){
// Rented books
Route::get('/detalji-izdavanja-knjige/{book:title}', [ReturnBookController::class, 'show'])->name('rented-info');
Route::get('/izdate-knjige', [RentBookController::class, 'index'])->name('rented-books');
Route::get('izdaj-knjigu/{id}',[RentBookController::class, 'create'])->name('rent-book');
Route::post('izdaj-knjigu/{id}',[RentBookController::class, 'store'])->name('store-rent-book');
});

Route::controller(ReturnBookController::class)->group(function(){
// Returned books
Route::get('/vracene-knjige', [ReturnBookController::class, 'index'])->name('returned-books');
Route::get('/vrati-knjigu/{id}', [ReturnBookController::class, 'create'])->name('return-book');
Route::post('/vrati-knjigu', [ReturnBookController::class, 'store'])->name('store-return-book');
});

Route::controller(ReserveBookController::class)->group(function(){
// Reserve a book
Route::get('/rezervisi-knjigu/{book:title}', [ReserveBookController::class, 'create'])->name('reserve-book');
Route::post('/rezervisi-knjigu/{id}', [ReserveBookController::class, 'store'])->name('store-reserve-book');
});

Route::controller(OverdueBookController::class)->group(function(){
// Overdue books
Route::get('/knjige-u-prekoracenju', [OverdueBookController::class, 'index'])->name('overdue-books');
});

Route::controller(ActiveReservationController::class)->group(function(){
// Active reservations
Route::get('/aktivne-rezervacije', [ActiveReservationController::class, 'index'])->name('active-reservations');
Route::put('/approve/{id}', [ActiveReservationController::class, 'approve'])->name('approve');
Route::put('/deny/{id}', [ActiveReservationController::class, 'deny'])->name('deny');
});






?>
