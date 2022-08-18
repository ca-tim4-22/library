<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = User::where('user_type_id', 1)->paginate(5);

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
        $input['last_login_at'] = Carbon::now();
        $input['password'] = Hash::make($request->password);

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/students', $name);
            $input['photo'] = $name; 
        } else {
            $input['photo'] = 'profileImg-default.jpg';
        }

        User::create($input);

        return to_route('all-student')->with('success-student', 'Uspješno ste registrovali učenika ' . "'$request->username'");
    }

    public function crop(Request $request) {
        $dest = 'storage/students';
        $file = $request->file('photo');
        $new_image_name = date('YmdHis').uniqid().'.jpg';

        $move = $file->move(public_path($dest), $new_image_name);

        if (!$move)  {
            return response()->json(['status' => 0, 'msg' => 'Greška!']);
        } else {
            // $user = auth()->user();
            // $userPhoto = $user->photo;

            // if ($userPhoto != '') {
            //     unlink($dest.$userPhoto);
            // }
            $user = User::where('id', Auth::user()->id)->update(['photo' => $new_image_name]);

            return response()->json(['status' => 1, 'msg' => 'Uspješno ste izmijenili profilnu sliku!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $student = $user;
        
        return view('pages.students.show_student', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        
        return view('pages.students.edit_student', compact('student'));
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
            $file->move('storage/students', $name);
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
    public function destroy(User $user)
    {
        $student = $user;

        if (Auth::user()->id == $student->id) {
            $student->delete();

            return to_route('redirect');
        }

        $student->delete();
        
        return to_route('all-student')->with('student-deleted', 'Uspješno ste izbrisali učenika.');
    }
}
