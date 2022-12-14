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
        $this->middleware('protect-all');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
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
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PublisherRequest $request)
    {
        $publisher = $request->name;
        $publisher_lower = Str::title($publisher);
        Publisher::create($request->validated());
        
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
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PublisherRequest $request, $id)
    {
        $publisher = Publisher::findOrFail($id);  
        $publisher->update($request->validated());
        
        return to_route('setting-publisher')->with('publisher-updated', 'Uspješno ste izmijenili izdavača: ' . "\"$publisher->name\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);

        return $publisher->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Publisher::whereIn('id', explode(",", $ids))->delete();
    }
}
