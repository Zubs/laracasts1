<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy()
    {
        Auth::logout();

        return redirect()->route('index')->with('success', 'Goodbye! I wished you\'d stay longer.');
    }
}
