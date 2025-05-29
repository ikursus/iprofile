<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required|min:4'
        ]);

        // $loginId = $_POST['email'];
        // $loginId = $request->input('email');
        // $password = $request->input('password');
        // $data = $request->only('email', 'password');

        return $data;
    }
}
