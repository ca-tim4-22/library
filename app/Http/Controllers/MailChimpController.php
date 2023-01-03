<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\Facades\Newsletter as Newsletter;
use Session;

class MailChimpController extends Controller
{
    public function index(Request $request)
    {
        $name = Auth::user()->name;

        if(!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribe($request->email, ['FNAME'=>$name]);

            Session::flash('success-mail'); 
            return back();
        } else {
            Session::flash('failure-mail'); 
            return back();
        }
    }
}