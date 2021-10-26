<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $mailchimp = new ApiClient();
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server_prefix')
        ]);

        try {
            $mailchimp->lists->addListMember("6a88abe3fe", [
                "email_address" => $fields['email'],
                "status" => "subscribed"
            ]);
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'email' => 'Unable to validate email!'
            ]);
        }

        return redirect()->route('index')->with('success', 'Thank you for subscribing to our newsletter');
    }
}
