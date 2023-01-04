<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    SettingController
};

Route::controller(SettingController::class)->group(function () {
// Settings - index pages
    Route::name('setting-')->prefix('podesavanja')->group(function () {
        Route::get('/polisa', 'policy')->name('policy');
        Route::get('/kategorije', 'category')->name('category');
        Route::get('/zanrovi', 'genre')->name('genre');
        Route::get('/izdavaci', 'publisher')->name('publisher');
        Route::get('/povezi', 'binding')->name('binding');
        Route::get('/formati', 'format')->name('format');
        Route::get('/pisma', 'letter')->name('letter');
    });
});

?>
