<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\AuthorRequest;
use Session;
use App\Models\Author;
use App\Models\GlobalVariable;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['protect-all', 'verified']);
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
        if ($searched) {
            $authors = Author::search($request->trazeno)->paginate($items);
            $count = Author::search($request->trazeno)->get()->count();
            if ($count == 0) {
                $show_criterium = true;
            } else {
                $show_criterium = false;
            }
        } else {
            $authors = Author::latest('id')->paginate($items);
            $show_criterium = false;
        }

        $show_all = Author::count();

        return view('pages.authors.authors',
            compact('authors', 'items', 'variable', 'show_all', 'searched',
                'show_criterium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.authors.new_author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthorRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(('storage/authors'), $filename);
            $validated['photo'] = $filename;
        }
        Session::flash('success-author');
        $author = Author::create($validated);

        return to_route('all-author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Author $author)
    {
        $author = $author;

        return view('pages.authors.show_author', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Author $author)
    {
        return view('pages.authors.edit_author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $author = Author::findOrFail($id);
        $photo_old = $request->photo;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(('storage/authors'), $filename);
            $validated['photo'] = $filename;
        }
        Session::flash('author-updated');
        $author->whereId($id)->first()->update($validated);

        return to_route('all-author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        return $author->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Author::whereIn('id', explode(",", $ids))->delete();
    }
}
