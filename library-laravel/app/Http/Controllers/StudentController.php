<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = User::where('user_type_id', 1)->get();
        return view('pages.students.students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.students.new_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_type_id'] = 1;
        $input['password'] = Hash::make($request->password);

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/librarians', $name);
            $input['photo'] = $name;
        } else {
            $input['photo'] = 'placeholder';
        }

        User::create($input);

        return to_route('all-student')->with('success-student', 'Uspješno ste registrovali učenika ' . "'$request->username'");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $student=User::findOrFail($id);
        return view('pages.students.show_student',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $student=User::findOrFail($id);
        return view('pages.students.edit_student',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
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
        return back()->with('student-updated', 'Uspješno ste izmijenili profil učenika.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student=User::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('student-deleted', 'Uspješno ste izbrisali učenika.');
    }
}
