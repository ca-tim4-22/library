<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class CategoryController extends Controller
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
        return view('pages.settings.category.new_category');
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
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/category', $name);
            $validated['icon'] = $name; 
            $validated['default'] = 'false'; 
        } else {
            $validated['icon'] = '/img/default_images_while_migrations/genres/placeholder.jpg';
        }
        FacadesSession::flash('success-category'); 
        Category::create($validated);

        return to_route('setting-category');
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
    public function edit(Category $category)
    {
        return view('pages.settings.category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = Category::findOrFail($id);
        $icon_old = $category->icon;
    
        if ($file = $request->file('icon')) {
            $name = date('d-M-Y') . '-' . $file->getClientOriginalName();
            $file->move('storage/settings/category', $name);
            $validated['icon'] = $name; 
            $validated['default'] = 'false'; 
        } else {
            $validated['icon'] = $icon_old;
        }
        FacadesSession::flash('category-updated'); 
        $category->update($validated);

        return to_route('setting-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $URL = url()->current();

        // Delete default icon && icon in storage
        if (str_contains($URL, 'tim4') && file_exists('storage/settings/category/' . $category->icon)) {
            unlink('storage/settings/category/' . $category->icon);
         } elseif(!str_contains($URL, 'tim4') && file_exists(public_path() . '\\storage\\settings\\category\\' . $category->icon)) {
           unlink(public_path() . '\\storage\\settings\\category\\' . $category->icon);
        }

        return $category->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id', explode(",", $ids))->delete();
    }
}
