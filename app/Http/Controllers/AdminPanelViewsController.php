<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelViewsController extends Controller
{
    public function logout()
    {
        $user = auth()->user();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
