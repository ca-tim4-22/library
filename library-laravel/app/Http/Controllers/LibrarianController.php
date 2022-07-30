<?php

namespace App\Http\Controllers;

use App\Http\Requests\Librarians\LibrarianCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        $librarians = User::where('user_type_id', 2)->get();
        return view('pages.librarians', compact('librarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.new_librarian');
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
    public function show($id)
    {
        $librarian = User::findOrFail($id);
        return view('pages.stranica', compact('librarian'));
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
        $librarian = User::findOrFail($id);
        $librarian->delete();
        return to_route('all-librarian')->with('librarian-deleted', 'Uspješno ste izbrisali bibliotekara.');
    }
}
