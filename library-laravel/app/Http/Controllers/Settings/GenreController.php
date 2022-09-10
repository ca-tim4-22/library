<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
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
        return view('pages.settings.genre.new_genre');
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
    public function store(GenreRequest $request)
    {
        $input = $request->all();
        $genre = $request->name;
        $genre_lower = Str::title($genre);

        if ($file = $request->file('icon')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/settings/genre', $name);
            $input['icon'] = $name;
            $input['default'] = 'false';
        } else {
            $input['icon'] = '/img/default_images_while_migrations/genres/placeholder.jpg';
        }

        Genre::create($input);

        return to_route('setting-genre')->with('success-genre', "Uspješno ste dodali žanr " . "\"$genre_lower\"");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request){
        $data=$request->input('search_genre');
        $query=Genre::where('name','like',"%$data%")->get();

        return redirect()->back()->with(['query'=>$query]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('pages.settings.genre.edit_genre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        $input = $request->all();
        $genre = Genre::findOrFail($id);

        $genre->update($input);

        return back()->with('genre-updated', 'Uspješno ste izmijenili žanr.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return to_route('setting-genre')->with('genre-deleted', 'Uspješno ste izbrisali žanr.');
    }
}
