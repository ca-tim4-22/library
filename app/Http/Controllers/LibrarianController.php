<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\GlobalVariable;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LibrarianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['protect-all', 'librarian-protect']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
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
            $librarians = User::search($request->trazeno)->where('user_type_id', 2)->paginate($items);

            $count = User::search($request->trazeno)->get()->count();
            if ($count == 0) {
                $show_criterium = true;
            } else {
                $show_criterium = false;
            }
        } else{
            $librarians = User::with('gender')->latest()->where('user_type_id', 2)->paginate($items);
            $show_criterium = false;
        }

        $count_model = new User();
        $show_all = $count_model->getCount(2);

        return view('pages.librarians.librarians', compact('librarians', 'items', 'variable', 'show_all', 'searched', 'show_criterium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.librarians.new_librarian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request, UserService $userService)
    {
        $userService->storeLibrarian($request);
        Session::flash('success-librarian'); 

        return to_route('all-librarian');
    }

    public function crop(Request $request) {
        $dest = 'storage/librarians';
        $file = $request->file('photo');
        $new_image_name = date('YmdHis').uniqid().'.jpg';

        $move = $file->move($dest, $new_image_name);

        if (!$move)  {
        return response()->json(['status' => 0, 'msg' => 'Greška!']);
        } else {
        $user = User::where('id', Auth::id())->update(['photo' => $new_image_name]);

        return response()->json(['status' => 1, 'msg' => 'Uspješno ste izmijenili profilnu sliku!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        if ($user->type->name == 'librarian') {
            $librarian = $user;
        } else {
            abort(404);
        }

        return view('pages.librarians.show_librarian', compact('librarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ($user->type->name == 'librarian') {
            $librarian = $user;
        } else {
            abort(404);
        }
        
        return view('pages.librarians.edit_librarian', compact('librarian'));
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
        $user = User::findOrFail($id);   
    
        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('storage/librarians', $name);
            $validated['photo'] = $name; 
        } 

        $user->whereId($id)->first()->update($validated);
        Session::flash('librarian-updated'); 

        return to_route('all-librarian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        $librarian = User::findOrFail($id);

        if (Auth::user()->id == $librarian->id) {
            $librarian->delete();

            return to_route('good-bye');
        }
        $URL = url()->previous();

        if ($librarian->photo != 'placeholder') {
            if ($URL == 'http://tim4.ictcortex.me/bibliotekari' || $URL == 'https://tim4.ictcortex.me/bibliotekari') {
                unlink('storage/librarians/' . $librarian->photo);
            } else {
                $path = '\\storage\\librarians\\' . $librarian->photo;
                unlink(public_path() . $path);
            }
        } 

        return $librarian->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', explode(",", $ids))->delete();
    }

}
