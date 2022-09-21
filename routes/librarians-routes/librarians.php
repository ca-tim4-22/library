<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    LibrarianController,
    UserController
};

Route::controller(LibrarianController::class)->group(function() {
// Librarians
Route::get('/bibliotekari', [LibrarianController::class, 'index'])->name('all-librarian');
Route::get('/bibliotekar/{user:username}', [LibrarianController::class, 'show'])->name('show-librarian');
Route::get('/novi-bibliotekar', [LibrarianController::class, 'create'])->name('new-librarian');
Route::post('/novi-bibliotekar', [LibrarianController::class, 'store'])->name('store-librarian');
Route::get('/izmijeni-profil-bibliotekara/{user:username}', [LibrarianController::class, 'edit'])->name('edit-librarian');
Route::put('/izmijeni-profil-bibliotekara/{id}', [LibrarianController::class, 'update'])->name('update-librarian');


// Delete ownself
Route::delete('/izbrisi-bibliotekara/{id}', [LibrarianController::class, 'destroy'])->name('destroy-librarian');

// For multiple librarian delete
Route::delete('izbrisi-sve', [LibrarianController::class, 'deleteMultiple'])->name('delete-all');


// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain librarian through URI
Route::get('/librarians/{id}', function ($id) {});
Route::post('/librarians/{id}', [LibrarianController::class, 'destroy'])->name('librarians.destroy');
});

Route::post('/resetuj-lozinku/{user}', [UserController::class, 'resetPassword'])->name('resetPassword');
Route::post('/crop/bibliotekar', [LibrarianController::class, 'crop'])->name('librarian.crop');


});


?>
