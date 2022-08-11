<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormatController extends Controller
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
        return view('pages.settings.format.new_format');
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
    public function store(Request $request)
    {
        $input = $request->all();
        $format = $request->name;
        $format_lower = Str::title($format);
        Format::create($input);
        
        return to_route('setting-format')->with('success-format', "Uspješno ste dodali " . "\"$format_lower\"" . "format.");
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
    public function edit($id)
    {
        $format = Format::findOrFail($id);
        return view('pages.settings.format.edit_format', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $format = Format::findOrFail($id);  

        $format->update($input);
        
        return back()->with('format-updated', 'Uspješno ste izmijenili format.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $format = Format::findOrFail($id);
        $format->delete();

        return to_route('setting-format')->with('format-deleted', 'Uspješno ste izbrisali format.');
    }
}
