<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'title' => 'dashboard'
        ]);
    }
    public function authenticated(Request $request, $user)
    {
        return redirect()->route('dashboard');
    }
}
