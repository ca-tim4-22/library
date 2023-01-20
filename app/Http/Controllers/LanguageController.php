<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back()->withFragment($request->lang);
    }
}
