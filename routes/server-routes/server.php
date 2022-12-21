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
Auth::routes(['register' => false, 'login' => false, 'reset' => false]);

// Login routes
Route::controller(LoginController::class)->group(function() {
Route::get('uloguj-se', 'showLoginForm')->name('login');
Route::post('uloguj-se', 'login');
// Logout route
Route::get('/logout', 'logout');

Route::get('/sign-in/github', 'github');
Route::get('/sign-in/github/redirect', 'githubRedirect');
});

// Middleware protection
Route::middleware('maintenance-protection')->group(function() {
// Server down route
Route::get('/shutdown', function() {
    Artisan::call('down', ['--render' => "maintenance.maintenance"]);
    return back();
});
});

Route::controller(ForgotPasswordController::class)->group(function() {
Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post'); 
Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});

?>