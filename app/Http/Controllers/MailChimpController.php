<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\Facades\Newsletter as Newsletter;
use Illuminate\Support\Facades\Session as FacadesSession;

class MailChimpController extends Controller
{
    public function index(Request $request)
    {
        $name = Auth::user()->name;

        if(!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribe($request->email, ['FNAME'=>$name]);

            FacadesSession::flash('success-mail'); 
            return back();
        } else {
            FacadesSession::flash('failure-mail'); 
            return back();
        }
    }
}