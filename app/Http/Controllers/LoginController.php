<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\ValidateLogin;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(ValidateLogin $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/events');
        }
        return back()
            ->with('alert', ['type' => 'danger', 'text' => 'Incorrect credentials.']);
    }
}
