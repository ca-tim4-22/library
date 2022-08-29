<?php 

use App\Http\Controllers\Auth\ {
    LoginController,
};

use Illuminate\Support\Facades\ {
    Artisan,
    Auth,
    Route,
};

// Make sure that path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome.welcome');
})->name('redirect');

// Middleware protection
Route::middleware('see-you-later-protection')->group(function(){
Route::get('good-bye', function () {
    return view('good-bye.good-bye');
})->name('good-bye');
});

// Laravel Authentication route
Auth::routes(['register' => false]);

// Logout route
Route::get('/logout', [LoginController::class, 'logout']);

// Middleware protection
Route::middleware('maintenance-protection')->group(function(){
// Server down route
Route::get('/shutdown', function(){
    Artisan::call('down', ['--render' => "maintenance.maintenance"]);
    return back();
});
});

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
});

?>