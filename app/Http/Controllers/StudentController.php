<?php

namespace App\Http\Controllers;

use App\Http\Requests\GitHubVerifyRequest;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\GlobalVariable;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['protect-all']);
    }

    public function approveIndex() {
        
        $user = User::where([
            'id' => Auth::id(),
            'active' => 0,
        ])->first();
   
        if (isset($user)) {
            return view('github-verify/github_verify', compact('user'));
        } else {
            return to_route('dashboard')
            ->withFragment('#uspjesno-logovanje');
        }
    }

    public function approveUpdate(GitHubVerifyRequest $request) {
        $input = $request->all();
        $user = Auth::user();

        if($request->result == 24) {
            $user->update([
                'JMBG' => $request->JMBG,
                'user_gender_id' => $request->user_gender_id,
                'active' => true,
            ]);

            return to_route('show-student', $user->username)
                ->with('account-approved', 'Aktivirali ste svoj nalog!')
                ->withFragment('#uspjesna-aktivacija');
        } else {
            return to_route('approve-index')
                ->withInput($request->input())
                ->withErrors(['result' => 'Unesena vrijednost nije odgovarajuća. Pokušajte ponovo'])
                ->withFragment('#ponovni-pokusaj');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $show_criterium = false;

        $searched = $request->trazeno;
        if($searched){
            $students = User::search($request->trazeno)->where('user_type_id', 1)->paginate($items);
            $count = User::search($request->trazeno)->get()->count();
            if ($count == 0) {
                $show_criterium = true;
            } else {
                $show_criterium = false;
            }
        }else{
            $students = User::with('gender')->latest()->where('user_type_id', 1)->paginate($items);
            $show_criterium = false;
        }
    
        $count_model = new User();
        $show_all = $count_model->getCount(1);

        return view('pages.students.students', compact('students', 'items', 'variable', 'show_all', 'searched', 'show_criterium'));
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
    public function store(UserStoreRequest $request, UserService $userService)
    {
        $userService->storeStudent($request);      
        Session::flash('success-student'); 

        return to_route('all-student');
    }

    public function crop(Request $request) {
        $dest = 'storage/students';
        $file = $request->file('photo');
        $new_image_name = date('YmdHis').uniqid().'.jpg';

        $move = $file->move($dest, $new_image_name);

        if (!$move)  {
            return response()->json(['status' => 0, 'msg' => 'Greška!']);
        } else {
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
        if ($user->type->name == 'student') {
            $student = $user;
        } else {
            abort(404);
        }
        
        return view('pages.students.show_student', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        if ($user->type->name == 'student') {
            $student = $user;
        } else {
            abort(404);
        }
        
        return view('pages.students.edit_student', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $user = Auth::user();
        $find_user = User::findOrFail($id);

        $photo_old = $request->photo;

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/students', $name);
            $validated['photo'] = $name;
        }

        $user->whereId($id)->first()->update($validated);
        Session::flash('student-updated'); 

        return to_route('all-student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        $student = User::findOrFail($id);

        if (Auth::user()->id == $student->id) {
            $student->delete();

            return to_route('good-bye');
        }
        
        $URL = url()->previous();

        if ($student->photo != 'placeholder') {
            if ($URL == 'http://tim4.ictcortex.me/ucenici') {
                unlink('storage/students/' . $student->photo);
            } else {
                $path = '\\storage\\students\\' . $student->photo;
                unlink(public_path() . $path);
            }
        } 

        return $student->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', explode(",", $ids))->delete();
    }
}
