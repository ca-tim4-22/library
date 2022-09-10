<?php

namespace App\Http\Controllers;

use App\Models\GlobalVariable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Custom methods
    public function policy() {
        // $policies = GlobalVariable::all();
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
        $categories = DB::table('categories')
        ->orderBy('id', 'desc')
        ->paginate($items);

        return view('pages.settings.category.settings-category', compact('categories', 'items', 'variable'));
    }
    public function genre(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }
        $genres = DB::table('genres')
        ->orderBy('id', 'desc')
        ->paginate($items);

        return view('pages.settings.genre.settings-genre', compact('genres', 'items', 'variable'));
    }
    public function publisher(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }
        $publishers = DB::table('publishers')
        ->orderBy('id', 'desc')
        ->paginate($items);

        return view('pages.settings.publisher.settings-publisher', compact('publishers', 'items', 'variable'));
    }
    public function binding(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }
        $bindings = DB::table('bindings')
         ->orderBy('id', 'desc')
         ->paginate($items);

        return view('pages.settings.binding.settings-binding', compact('bindings', 'items', 'variable'));
    }
    public function format(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }
        $formats = DB::table('formats')
         ->orderBy('id', 'desc')
         ->paginate($items);

        return view('pages.settings.format.settings-format', compact('formats', 'items', 'variable'));
    }
    public function letter(Request $request) {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }
         $letters = DB::table('letters')
         ->orderBy('id', 'desc')
         ->paginate($items);
        return view('pages.settings.letter.settings-letter', compact('letters', 'items', 'variable'));
    }
}
