<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\Settings\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('protect-all');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
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
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GenreRequest $request)
    {
        $validated = $request->validated();

        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/genre', $name);
            $validated['icon'] = $name; 
            $validated['default'] = 'false'; 
        } else {
            $validated['icon'] = '/img/default_images_while_migrations/genres/placeholder.jpg';
        }
        Session::flash('success-genre'); 
        Genre::create($validated);

        return to_route('setting-genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit(Genre $genre)
    {
        return view('pages.settings.genre.edit_genre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GenreRequest $request, $id)
    {
        $input = $request->all();
        $genre = Genre::findOrFail($id);  

        $icon_old = $genre->icon;
    
        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/genre', $name);
            $input['icon'] = $name; 
            $input['default'] = 'false'; 
        } else {
            $input['icon'] = $icon_old;
        }

        $genre->update($input);
        
        return to_route('setting-genre')->with('genre-updated', 'Uspješno ste izmijenili žanr: ' . "\"$genre->name\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        $URL = url()->current();

        // Delete default icon && icon in storage
        if (str_contains($URL, 'tim4') && file_exists('storage/settings/genre/' . $genre->icon)) {
            unlink('storage/settings/genre/' . $genre->icon);
         } elseif(!str_contains($URL, 'tim4') && file_exists(public_path() . '\\storage\\settings\\genre\\' . $genre->icon)) {
           unlink(public_path() . '\\storage\\settings\\genre\\' . $genre->icon);
        }

        return $genre->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Genre::whereIn('id', explode(",", $ids))->delete();
    }
}
