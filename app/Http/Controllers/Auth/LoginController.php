<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Socialite;
use Str;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // Redirect to dashboard
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Last Login At Listener
    public function authenticated(Request $request, $user) {
        $user->login_count = $user->login_count + 1;
        $user->last_login_at = now();
        $user->save();
    }
    
    public function github() {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect() {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $user->nickname
        ], [
            'email' => $user->nickname,
            'name' => $user->name,
            'username' => $user->nickname,
            'user_gender_id' => 1,
            'password' => bcrypt(Str::random(10)),
        ]);
        $user->update([
            'login_count'=> $user->login_count + 1,
            'last_login_at'=> now(),
        ]);
        Auth::login($user, true);

        return redirect('/dashboard');
    }
}
