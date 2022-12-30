<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordReset\MinimumPasswordLengthRule;
use App\Rules\PasswordReset\RegexCheckRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('protect-all');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->noContent();
        Newsletter::subscribe('rincewind@discworld.com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }

    // Custom password reset with modal
    public function resetPassword(User $user, Request $request) {
        $request->validate([            
                'password' => [
                'confirmed',
                new MinimumPasswordLengthRule(),
                new RegexCheckRule(),
            ]
        ]);
        $user->name = $user->name;
        $user->username = $user->username;
        $user->email = $user->email;
        $user->JMBG = $user->JMBG;
        $user->password = bcrypt($request['password']);
        $user->save();

        DB::table('oauth_access_tokens')
        ->where('user_id', Auth::id())
        ->update([
            'revoked' => 1
        ]);

        return back()->with('password-updated', 'Uspješno ste izmijenili lozinku.');
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', explode(",", $ids))->delete();
    }
}
