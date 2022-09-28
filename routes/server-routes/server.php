<?php 

use App\Http\Controllers\Auth\ {
    ForgotPasswordController,
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

// Welcome view
Route::view('/pocetna', 'welcome.welcome')->name('redirect');

// Middleware protection
Route::middleware('see-you-later-protection')->group(function(){
Route::view('/good-bye', 'good-bye.good-bye')->name('good-bye');
});

// Laravel Authentication route
Auth::routes(['register' => false, 'login' => false]);

Route::get('/register', function() {
    return response('Not found', 404);
});

Route::get('uloguj-se', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('uloguj-se', [LoginController::class, 'login']);

// Logout route
Route::get('/logout', [LoginController::class, 'logout']);

// Middleware protection
Route::middleware('maintenance-protection')->group(function() {
// Server down route
Route::get('/shutdown', function() {
    Artisan::call('down', ['--render' => "maintenance.maintenance"]);
    return back();
});
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

?>