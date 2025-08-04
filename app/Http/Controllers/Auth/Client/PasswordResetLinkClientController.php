<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkClientController extends Controller
{
    public function create()
    {
        return view('client.auth.forgot-password'); // vue formulaire email
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('clients')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
