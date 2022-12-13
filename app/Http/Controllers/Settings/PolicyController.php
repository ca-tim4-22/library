<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\PolicyPaginationUpdateRequest;
use App\Http\Requests\Settings\PolicyUpdateRequest;
use App\Models\GlobalVariable;
use Illuminate\Http\Request;

class PolicyController extends Controller
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
        //
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyUpdateRequest $request, $id)
    {
        $policy = GlobalVariable::findOrFail($id);
        $policy->update($request->validated());

        return back()->with('policy-updated', 'Izmijenili ste polisu: ' . "\"$policy->variable\".");
    }

    public function paginationUpdate(PolicyPaginationUpdateRequest $request) 
    {
        $policy = GlobalVariable::findOrFail(4);
        $policy->update($request->validated());

        return back()->with('policy-updated', 'Izmijenili ste polisu: ' . "\"$policy->variable\".");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
