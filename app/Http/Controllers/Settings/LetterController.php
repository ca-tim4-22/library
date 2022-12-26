<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Http\Requests\Settings\LetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
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
        return view('pages.settings.letter.new_letter');
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
    public function store(LetterRequest $request)
    {
        FacadesSession::flash('success-letter'); 
        Letter::create($request->validated());
        
        return to_route('setting-letter');
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
    public function edit(Letter $letter)
    {
        return view('pages.settings.letter.edit_letter', compact('letter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LetterRequest $request, $id)
    {
        $letter = Letter::findOrFail($id);  
        $letter->update($request->validated());
        
        return to_route('setting-letter')->with('letter-updated', 'Uspješno ste izmijenili pismo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $letter = Letter::findOrFail($id);

        return $letter->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Letter::whereIn('id', explode(",", $ids))->delete();
    }
}
