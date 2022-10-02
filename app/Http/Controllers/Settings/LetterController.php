<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\LetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LetterController extends Controller
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
        return view('pages.settings.letter.new_letter');
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
    public function store(LetterRequest $request)
    {
        $input = $request->all();
        $letter = $request->name;
        $letter_lower = Str::title($letter);
        Letter::create($input);
        
        return to_route('setting-letter')->with('success-letter', "Uspješno ste dodali " . "\"$letter_lower\"" . "pismo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        return view('pages.settings.letter.edit_letter', compact('letter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LetterRequest $request, $id)
    {
        $letter = Letter::findOrFail($id);  
        $input = $request->all();

        $letter->update($input);
        
        return to_route('edit-letter', $request->name)->with('letter-updated', 'Uspješno ste izmijenili pismo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Letter::whereIn('id', explode(",", $ids))->delete();
    }
}
