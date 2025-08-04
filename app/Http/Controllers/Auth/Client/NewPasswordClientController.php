<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class NewPasswordClientController extends Controller
{
    public function create(Request $request, $token = null)
    {
        return view('client.auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('clients')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($client, $password) {
                $client->password = Hash::make($password);
                $client->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('client.auth.login')->with('success', 'Mot de passe réinitialisé avec succès.')
            : back()->withErrors(['email' => __($status)]);
    }
}
