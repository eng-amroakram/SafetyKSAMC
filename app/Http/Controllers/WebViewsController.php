<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebViewsController extends Controller
{
    public function landing()
    {
        return view('landing');
    }

    public function signature()
    {
        return view('web.signature');
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            Auth::logout($user);
            return redirect()->route('web.landing');
        }

        return "";
    }
}
