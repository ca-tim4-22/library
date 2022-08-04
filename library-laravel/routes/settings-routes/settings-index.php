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

// Plural
Route::get('/polisa', [SettingController::class, 'policy'])->name('policy');
Route::get('/kategorije', [SettingController::class, 'category'])->name('category');
Route::get('/zanrovi', [SettingController::class, 'genre'])->name('genre');
// Singular
Route::get('/izdavac', [SettingController::class, 'publisher'])->name('publisher');
Route::get('/povez', [SettingController::class, 'binding'])->name('binding');
Route::get('/format', [SettingController::class, 'format'])->name('format');
Route::get('/pismo', [SettingController::class, 'letter'])->name('letter');
    
});

});

?>
