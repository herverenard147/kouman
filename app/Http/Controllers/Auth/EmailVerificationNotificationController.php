<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // if ($request->user()->hasVerifiedEmail()) {
        //     return redirect()->intended(route('client.index', absolute: false));
        // }

        // $request->user()->sendEmailVerificationNotification();

        // return back()->with('status', 'verification-link-sent');
        $client = $request->user('client');
        $partenaire = $request->user('partenaire');

        if ($client) {
            $user = $client;
            $redirect = route('client.index');
        } elseif ($partenaire) {
            $user = $partenaire;
            $redirect = route('partenaire.dashboard');
        } else {
            abort(403, 'Aucun utilisateur connecté');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended($redirect);
        }

        $user->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
