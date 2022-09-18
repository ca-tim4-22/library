<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    BindingController
};

Route::controller(BindingController::class)->group(function() {
Route::get('/podesavanja/novi-povez', [BindingController::class, 'index'])->name('new-binding');
Route::post('/podesavanja/kreiranje-novog-poveza', [BindingController::class, 'store'])->name('store-binding');
Route::delete('/podesavanja/brisanje-poveza/{id}', [BindingController::class, 'destroy'])->name('destroy-binding');
Route::get('/podesavanja/izmijeni-povez/{id}', [BindingController::class, 'edit'])->name('edit-binding');
Route::put('/podesavanja/izmijeni-povez/{id}', [BindingController::class, 'update'])->name('update-binding');
});

?>
