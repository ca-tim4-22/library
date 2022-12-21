<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    StudentController
};

Route::controller(StudentController::class)->group(function() {

Route::get('/approvee', 'approvee')->name('approvee');
Route::put('/approvee/{id}', 'updatic')->name('updatic');

// Students
Route::get('/ucenici', 'index')->name('all-student');
Route::get('/ucenik/{user:username}', 'show')->name('show-student');
Route::get('/novi-ucenik', 'create')->name('new-student');
Route::post('/novi-ucenik', 'store')->name('store-student');
Route::get('/izmijeni-profil-ucenika/{user:username}', 'edit')->name('edit-student');
Route::put('/izmijeni-profil-ucenika/{id}', 'update')->name('update-student');

// Additional features

// Delete ownself
Route::delete('/izbrisi-ucenika/{id}', 'destroy')->name('destroy-student');

// For multiple student delete
Route::delete('izbrisi-sve/ucenike', 'deleteMultiple')->name('delete-all-students');

// Middleware protection
Route::middleware('user-delete')->group(function() {
// Protection for deleting a certain student through URI
Route::get('/ucenici/{id}', function ($id) {});
Route::post('/ucenici/{id}', 'destroy')->name('students.destroy');
});

Route::post('/crop/ucenik', 'crop')->name('student.crop');

});


?>
