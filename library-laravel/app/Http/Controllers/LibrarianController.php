<?php

namespace App\Http\Controllers;

use App\Http\Requests\Librarians\LibrarianCreateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $librarians = User::where('user_type_id', 2)->paginate(5);

        return view('pages.librarians.librarians', compact('librarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.librarians.new_librarian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibrarianCreateRequest $request)
    {
        $input = $request->all();
        $input['user_type_id'] = 2;
        $input['last_login_at'] = Carbon::now();
        $input['password'] = Hash::make($request->password);

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/librarians', $name);
            $input['photo'] = $name; 
        } else {
            $input['photo'] = 'profileImg-default.jpg';
        }
        
        User::create($input);

        return to_route('all-librarian')->with('success-librarian', 'Uspješno ste registrovali bibliotekara ' . "'$request->username'");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $librarian = $user;

        return view('pages.librarians.show_librarian', compact('librarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $librarian = User::findOrFail($id);
        
        return view('pages.librarians.edit_librarian', compact('librarian'));
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
        $input = $request->all();
        $user = Auth::user();   

        $photo_old = $request->photo;
    
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/librarians', $name);
            $input['photo'] = $name; 
        } 

        if ($request->password) {
            $input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = Auth::user()->password;
        }

        $user->whereId($id)->first()->update($input);
        
        return back()->with('librarian-updated', 'Uspješno ste izmijenili profil bibliotekara.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $librarian = $user;

        if (Auth::user()->id == $librarian->id) {
            $librarian->delete();

            return to_route('redirect');
        }

        $librarian->delete();
        
        return to_route('all-librarian')->with('librarian-deleted', 'Uspješno ste izbrisali bibliotekara.');
    }
}
