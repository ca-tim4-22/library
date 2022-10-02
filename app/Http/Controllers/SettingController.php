<?php

namespace App\Http\Controllers;

use App\Models\Binding;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\GlobalVariable;
use App\Models\Letter;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'librarian-protect']);
    }
    
    // Custom methods
    public function policy() {
        $policy1 = GlobalVariable::findOrFail(1);
        $policy2 = GlobalVariable::findOrFail(2);
        $policy3 = GlobalVariable::findOrFail(3); 
        $policy4 = GlobalVariable::findOrFail(4); 
        return view('pages.settings.policy.settings-policy', compact('policy1', 'policy2', 'policy3', 'policy4'));
    }
    public function category(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $categories = Category::search($request->trazeno)->paginate($items);
        } else{
            $categories = Category::latest('id')->paginate($items);
        }
  
        return view('pages.settings.category.settings-category', compact('categories', 'items', 'variable', 'searched'));
    }
    public function genre(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $genres = Genre::search($request->trazeno)->paginate($items);
        } else{
            $genres = Genre::latest('id')->paginate($items);
        }

        return view('pages.settings.genre.settings-genre', compact('genres', 'items', 'variable', 'searched'));
    }
    public function publisher(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $publishers = Publisher::search($request->trazeno)->paginate($items);
        } else{
            $publishers = Publisher::latest('id')->paginate($items);
        }
       
        return view('pages.settings.publisher.settings-publisher', compact('publishers', 'items', 'variable', 'searched'));
    }
    public function binding(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $bindings = Binding::search($request->trazeno)->paginate($items);
        } else{
            $bindings = Binding::latest('id')->paginate($items);
        }
      
        return view('pages.settings.binding.settings-binding', compact('bindings', 'items', 'variable', 'searched'));
    }
    public function format(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $formats = Format::search($request->trazeno)->paginate($items);
        } else{
            $formats = Format::latest('id')->paginate($items);
        }

        return view('pages.settings.format.settings-format', compact('formats', 'items', 'variable', 'searched'));
    }
    public function letter(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $searched = $request->trazeno;
        if($searched){
            $letters = Letter::search($request->trazeno)->paginate($items);
        } else{
            $letters = Letter::latest('id')->paginate($items);
        }

        return view('pages.settings.letter.settings-letter', compact('letters', 'items', 'variable', 'searched'));
    }
}
