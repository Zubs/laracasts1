<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['string', 'required', 'min:3', 'max:255'],
            'username' => ['string', 'required', 'min:3', 'max:255'],
            'email' => ['email', 'required', 'unique:users', 'max:255'],
            'password' => ['string', 'between:8,20', 'max:255']
        ]);

        $fields['password'] = Hash::make($fields['password']);
        $fields['slug'] = Str::slug($fields['name']);

        $user = User::create($fields);

        return redirect()->route('index');
    }
}
