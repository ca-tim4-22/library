<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AuthorController
};

Route::controller(AuthorController::class)->group(function() {
// Authors
Route::get('/autori', [AuthorController::class, 'index'])->name('all-author');
Route::get('/autor/{author:NameSurname}', [AuthorController::class, 'show'])->name('show-author');
Route::get('/novi-autor', [AuthorController::class, 'create'])->name('new-author');
Route::post('/novi-autor', [AuthorController::class, 'store'])->name('store-author');
Route::get('/izmijeni-autora/{author:NameSurname}', [AuthorController::class, 'edit'])->name('edit-author');
Route::put('/izmijeni-autora/{id}', [AuthorController::class, 'update'])->name('update-author');
Route::delete('/izbrisi-autora/{id}', [AuthorController::class, 'destroy'])->name('destroy-author');
});

// Additional features

// For multiple author delete
Route::delete('izbrisi-sve/autore', [AuthorController::class, 'deleteMultiple'])->name('delete-all-authors');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain author through URI
Route::get('/autori/{id}', function ($id) {});
Route::post('/autori/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});

?>
