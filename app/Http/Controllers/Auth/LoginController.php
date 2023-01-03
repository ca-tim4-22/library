<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    // Redirect to dashboard
    protected $redirectTo = RouteServiceProvider::HOME;

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
    
    public function gitHub() {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect() {
        $user = Socialite::driver('github')->user();

        $user2 = User::firstOrCreate([
            'email' => $user->getNickname()
        ], [
            'email' => $user->getNickname(),
            'name' => $user->getName(),
            'username' => $user->getNickname(),
            'password' => bcrypt(Str::random(10)),
            'photo' => 'github_avatar' . '-' . uniqid() . '.png',
            'github' => 1,
            'active' => 0
        ]);

        $URL = url()->current();
        if (str_contains($URL, 'tim4')) {
            Storage::disk('third_party_upload')->put($user2->photo, file_get_contents($user->getAvatar()));
        } else {
            Storage::disk('local')->put($user2->photo, file_get_contents($user->getAvatar()));
        }
     
        $user2->update([
            'login_count'=> $user2->login_count + 1,
            'last_login_at'=> now(),
        ]);
        Auth::login($user2, true);

        if ($user2->github == 1) {
            return to_route('approve-index');
        } else {
            return redirect($this->redirectTo);
        }
    }
}
