<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(Request $request, Newsletter $newsletter)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $newsletter->subscribe($fields['email']);
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'email' => 'Unable to validate email!'
            ]);
        }

        return redirect()->route('index')->with('success', 'Thank you for subscribing to our newsletter');
    }
}
