<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    ExtraController
};

Route::controller(ExtraController::class)->group(function() {
Route::get('/podesavanja/dodatno', [ExtraController::class, 'index'])->name('setting-extra');
Route::post('/csv_autori', [ExtraController::class, 'csvAuthors'])->name('csvAuthors');
Route::post('/csv_knjige', [ExtraController::class, 'csvBooks'])->name('csvBooks');
Route::post('/csv_galerija', [ExtraController::class, 'csvGallery'])->name('csvGallery');
Route::post('/csv_knjiga_autori', [ExtraController::class, 'csvBookAuthors'])->name('csvBookAuthors');
Route::post('/csv_knjiga_kategorije', [ExtraController::class, 'csvBookCategories'])->name('csvBookCategories');
Route::post('/csv_knjiga_zanrovi', [ExtraController::class, 'csvBookGenres'])->name('csvBookGenres');
});

?>
