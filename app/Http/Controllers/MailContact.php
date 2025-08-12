<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\envoyerMessage;
use Exception;
use Illuminate\Support\Facades\Log;

class MailContact extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'comments' => 'required|string',
        ]);
        try {
            // dd(Mail::to('teamw@afriqueévasion.com'));
            // Envoi de l'email
            Mail::to('contact@afriqueévasion.com')->send(new envoyerMessage($validated));

            return back()->with('success', 'Votre message a été envoyé avec succès.');
        } catch (Exception $e) {
            Log::error('Erreur lors de l\'envoi du message de contact : ' . $e->getMessage());
            return back()->withInput()->withErrors(['email' => 'Une erreur est survenue lors de l’envoi. Veuillez réessayer.']);
        }
    }

}
