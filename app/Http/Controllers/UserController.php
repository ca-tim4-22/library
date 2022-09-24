<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordReset\MinimumPasswordLengthRule;
use App\Rules\PasswordReset\RegexCheckRule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
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

        return back()->with('password-updated', 'Uspješno ste izmijenili lozinku.');
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', explode(",", $ids))->delete();
    }
}
