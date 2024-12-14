<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dologin()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        //dd($request->validated());

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.index'));
        }
        return to_route('auth.dologin')->with('success', 'Identifiant ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.dologin');
    }
}