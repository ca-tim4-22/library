<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Custom
    
    public function policy() {
        return view('pages.settings.policy.settings-policy');
    }
    public function category() {
        return view('pages.settings.category.settings-category');
    }
    public function genre() {
        return view('pages.settings.genre.settings-genre');
    }
    public function publisher() {
        return view('pages.settings.publisher.settings-publisher');
    }
    public function binding() {
        return view('pages.settings.binding.settings-binding');
    }
    public function format() {
        return view('pages.settings.format.settings-format');
    }
    public function letter() {
        return view('pages.settings.letter.settings-letter');
    }
}
