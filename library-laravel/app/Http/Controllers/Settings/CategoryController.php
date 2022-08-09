<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.settings.category.new_category');
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
        $category = $request->name;
        $category_lower = Str::title($category);
    
        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/category', $name);
            $input['icon'] = $name; 
            $input['default'] = 'false'; 
        } else {
            $input['icon'] = 'placeholder.jpg';
        }

        Category::create($input);

        return to_route('setting-category')->with('success-category', "Uspješno ste dodali kategoriju " . "\"$category_lower\"");
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
        $category = Category::findOrFail($id);
        return view('pages.settings.category.edit_category', compact('category'));
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
        $category = Category::findOrFail($id);  

        $icon_old = $category->icon;
    
        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/category', $name);
            $input['icon'] = $name; 
        } else {
            $input['icon'] = $icon_old;
        }

        $category->update($input);
        
        return back()->with('category-updated', 'Uspješno ste izmijenili kategoriju.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return to_route('setting-category')->with('category-deleted', 'Uspješno ste izbrisali kategoriju.');
    }
}
