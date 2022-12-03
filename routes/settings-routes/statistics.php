<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    ExtraController
};

Route::controller(ExtraController::class)->group(function() {
Route::get('/podesavanja/statistika', 'indexStatistics')->name('setting-statistics');
});

?>
