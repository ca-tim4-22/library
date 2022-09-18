<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    SettingController
};

Route::controller(SettingController::class)->group(function() {
// Settings - index pages
Route::name('setting-')->prefix('podesavanja')->group(function() {
Route::get('/polisa', [SettingController::class, 'policy'])->name('policy');
Route::get('/kategorije', [SettingController::class, 'category'])->name('category');
Route::get('/zanrovi', [SettingController::class, 'genre'])->name('genre');
Route::get('/izdavaci', [SettingController::class, 'publisher'])->name('publisher');
Route::get('/povezi', [SettingController::class, 'binding'])->name('binding');
Route::get('/formati', [SettingController::class, 'format'])->name('format');
Route::get('/pisma', [SettingController::class, 'letter'])->name('letter'); 
});
});

?>
