<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    ExtraController
};

Route::controller(ExtraController::class)->group(function() {
Route::get('/podesavanja/dodatno', [ExtraController::class, 'index'])->name('setting-extra');
Route::post('/sacuvaj-csv', [ExtraController::class, 'save'])->name('save');
});

?>
