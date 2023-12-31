<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
        return view('admin.auth.login');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile', [
            'user' => Auth::user(),
        ]);
    }
}
