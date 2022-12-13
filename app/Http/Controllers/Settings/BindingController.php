<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\BindingRequest;
use App\Models\Binding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BindingController extends Controller
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
        return view('pages.settings.binding.new_binding');
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
    public function store(BindingRequest $request)
    {
        $binding = $request->name;
        $binding_lower = Str::title($binding);
        Binding::create($request->validated());
        
        return to_route('setting-binding')->with('success-binding', "Uspješno ste dodali " . "\"$binding_lower\"" . "povez.");
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
    public function edit(Binding $binding)
    {
        return view('pages.settings.binding.edit_binding', compact('binding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BindingRequest $request, $id)
    {
        $binding = Binding::findOrFail($id);  
        $binding->update($request->validated());
        
        return to_route('setting-binding')->with('binding-updated', 'Uspješno ste izmijenili povez: ' . "\"$binding->name\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $binding = Binding::findOrFail($id);
        $binding->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Binding::whereIn('id', explode(",", $ids))->delete();
    }
}
