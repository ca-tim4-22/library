<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\AuthorRequest;
use App\Models\Author;
use App\Models\GlobalVariable;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
            $authors = Author::search($request->trazeno)->paginate($items);
            $count = Author::search($request->trazeno)->get()->count();
            if ($count == 0) {
                $show_criterium = true;
            } else {
                $show_criterium = false;
            }
        }else{
            $authors = Author::latest('id')->paginate($items);
            $show_criterium = false;
        }

        $show_all = Author::latest('id')->count();

        return view('pages.authors.authors', compact('authors', 'items', 'variable', 'show_all', 'searched', 'show_criterium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.authors.new_author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $input = $request->all();
        
        $author = Author::create($input);

        return to_route('all-author')->with('success-author', 'Uspješno ste dodali autora ' . "'$author->NameSurname'.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $author = $author;
        
        return view('pages.authors.edit_author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $input = $request->all();
        $author = Author::findOrFail($id);  

        $author->update($input);

        return to_route('all-author')->with('author-updated', 'Uspješno ste izmijenili autora: ' . "\"$author->NameSurname\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Author::whereIn('id', explode(",", $ids))->delete();
    }
}
