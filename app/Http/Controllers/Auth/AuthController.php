<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->except(['_token']);
        Auth::attempt($credentials);
        if (Auth::check()) {
            $user = \App\Models\User::where('username', $request["username"])->first();
            if ($user) {
                return redirect(route('home'));
            } else {
                return redirect(route('login'));
                // return redirect()->back()->withErrors(['Email is not valid']);
            }
        } else {
            return redirect(route('login'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
