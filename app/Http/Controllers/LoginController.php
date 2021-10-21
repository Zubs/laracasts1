<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => ['email', 'required', 'exists:users', 'max:255'],
            'password' => ['string', 'required']
        ]);

        if (Auth::attempt($fields)) {
            session()->regenerate();

            return redirect()->route('index')->with('success', 'Welcome back to the good life');
        }

        throw ValidationException::withMessages(['email' => 'The provided credentials could not be verified!']);
    }
}
