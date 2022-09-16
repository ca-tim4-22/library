<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    StudentController
};

Route::controller(StudentController::class)->group(function() {
// Students
Route::get('/ucenici', [StudentController::class, 'index'])->name('all-student');
Route::get('/ucenik/{user:username}', [StudentController::class, 'show'])->name('show-student');
Route::get('/novi-ucenik', [StudentController::class, 'create'])->name('new-student');
Route::post('/novi-ucenik', [StudentController::class, 'store'])->name('store-student');
Route::get('/izmijeni-profil-ucenika/{user:username}', [StudentController::class, 'edit'])->name('edit-student');
Route::put('/izmijeni-profil-ucenika/{id}', [StudentController::class, 'update'])->name('update-student');

// Delete ownself
Route::delete('/izbrisi-ucenika/{id}', [StudentController::class, 'destroy'])->name('destroy-student');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain student through URI
Route::get('/students/{id}', function ($id) {});
Route::post('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});
});

Route::post('/crop/ucenik', [StudentController::class, 'crop'])->name('student.crop');

?>
