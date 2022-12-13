<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\FormatRequest;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormatController extends Controller
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
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormatRequest $request)
    {
        $format = $request->name;
        $format_lower = Str::title($format);
        Format::create($request->validated());
        
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
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Format $format)
    {
        return view('pages.settings.format.edit_format', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormatRequest $request, $id)
    {
        $format = Format::findOrFail($id);  
        $format->update($request->validated());
        
        return to_route('setting-format')->with('format-updated', 'Uspješno ste izmijenili format: ' . "\"$format->name\".");
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
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Format::whereIn('id', explode(",", $ids))->delete();
    }
}
