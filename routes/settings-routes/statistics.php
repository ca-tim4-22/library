<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    ExtraController
};

Route::controller(ExtraController::class)->group(function() {
Route::get('/podesavanja/statistika', [ExtraController::class, 'indexStatistics'])->name('setting-statistics');
});

?>
