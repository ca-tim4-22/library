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
        $this->middleware('auth');
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
        $input = $request->all();
        $binding = $request->name;
        $binding_lower = Str::title($binding);
        Binding::create($input);
        
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
    public function edit($id)
    {
        $binding = Binding::findOrFail($id);
        
        return view('pages.settings.binding.edit_binding', compact('binding'));
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
        $binding = Binding::findOrFail($id);  

        $binding->update($input);
        
        return back()->with('binding-updated', 'Uspješno ste izmijenili povez: ' . "\"$binding->name\".");
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

        return to_route('setting-binding')->with('binding-deleted', "Uspješno ste izbrisali povez \"$binding->name\".");
    }
}
