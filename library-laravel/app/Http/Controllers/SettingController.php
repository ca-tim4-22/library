<?php

namespace App\Http\Controllers;

use App\Models\Genre;
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
        $policies = GlobalVariable::all();
        return view('pages.settings.policy.settings-policy', compact('policies'));
    }
    public function category() {
        $categories = DB::table('categories')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.category.settings-category', compact('categories'));
    }
    public function genre() {
        $genres = DB::table('genres')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.genre.settings-genre', compact('genres'));
    }
    public function publisher() {
        $publishers = DB::table('publishers')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.publisher.settings-publisher', compact('publishers'));
    }
    public function binding() {
        $bindings = DB::table('bindings')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.binding.settings-binding', compact('bindings'));
    }
    public function format() {
        $formats = DB::table('formats')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.format.settings-format', compact('formats'));
    }
    public function letter() {
        $letters = DB::table('letters')
         -> orderBy('id', 'desc')
         -> get();
        return view('pages.settings.letter.settings-letter', compact('letters'));
    }
}
