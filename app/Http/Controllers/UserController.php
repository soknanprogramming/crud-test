<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        return redirect('/');
    }

    public function login()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        return redirect('/');
    }

    public function logout()
    {
        return redirect('/');
    }
}
