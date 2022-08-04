<?php 

use App\Http\Controllers\Auth\ {
    LoginController,
};

use Illuminate\Support\Facades\ {
    Artisan,
    Redirect,
    Route,
};

// Make sure that path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

// Laravel Authentication route
Route::auth(['verify' => 'true']);

// Logout route
Route::get('/logout', [LoginController::class, 'logout']);

// Server down route
Route::get('/shutdown', function(){
    Artisan::call('down', ['--render' => "maintenance"]);
    return back();
});

?>
