<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    ExtraController
};

Route::controller(ExtraController::class)->group(function () {
    Route::get('/podesavanja/dodatno', 'index')->name('setting-extra');
    Route::post('/csv_autori', 'csvAuthors')->name('csvAuthors');
    Route::post('/csv_knjige', 'csvBooks')->name('csvBooks');
    Route::post('/csv_galerija', 'csvGallery')->name('csvGallery');
    Route::post('/csv_knjiga_autori', 'csvBookAuthors')->name('csvBookAuthors');
    Route::post('/csv_knjiga_kategorije', 'csvBookCategories')
        ->name('csvBookCategories');
    Route::post('/csv_knjiga_zanrovi', 'csvBookGenres')->name('csvBookGenres');
    Route::get('/upustvo-za-csv', 'readme')->name('readme');

    Route::get('/podesavanja/statistika', 'indexStatistics')
        ->name('setting-statistics');
});

?>
