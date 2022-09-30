<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublisherController extends Controller
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
        return view('pages.settings.publisher.new_publisher');
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
    public function store(PublisherRequest $request)
    {
        $input = $request->all();
        $publisher = $request->name;
        $publisher_lower = Str::title($publisher);
        Publisher::create($input);
        
        return to_route('setting-publisher')->with('success-publisher', "Uspješno ste dodali " . "\"$publisher_lower\"" . "izdavača.");
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
    public function edit(Publisher $publisher)
    {
        return view('pages.settings.publisher.edit_publisher', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, $id)
    {
        $input = $request->all();
        $publisher = Publisher::findOrFail($id);  

        $publisher->update($input);
        
        return to_route('edit-publisher', $request->name)->with('publisher-updated', 'Uspješno ste izmijenili izdavača: ' . "\"$publisher->name\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return to_route('setting-publisher')->with('publisher-deleted', "Uspješno ste izbrisali izdavača \"$publisher->name\".");
    }
}
