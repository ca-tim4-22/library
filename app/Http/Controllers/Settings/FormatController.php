<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\Settings\FormatRequest;
use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormatRequest $request)
    {
        Session::flash('success-format');
        Format::create($request->validated());

        return to_route('setting-format');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
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
     *
     * @return \Illuminate\View\View
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormatRequest $request, $id)
    {
        $format = Format::findOrFail($id);
        $format->update($request->validated());

        return to_route('setting-format')->with('format-updated',
            'Uspješno ste izmijenili format: '."\"$format->name\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $format = Format::findOrFail($id);

        return $format->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Format::whereIn('id', explode(",", $ids))->delete();
    }
}
