<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientProfileController extends Controller
{
    public function edit()
    {
        $client = Auth::guard('client')->user();
        return view('client.profile-setting', compact('client'));
    }

    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();

        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'url' => 'nullable|url',
            'genre' => 'nullable|in:homme,femme,autre',
            'langue_preferee' => 'nullable|in:fr,en,es',
            'code_postal' => 'nullable|string|max:20',  // tu peux ajuster max selon besoin
            'pays' => 'nullable|string|max:255',
        ]);

        $client->update($validated);

        return redirect()->route('client.profile')->with('success', 'Profil mis à jour avec succès.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::guard('client')->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('client.profile')->withErrors(['old_password' => 'L\'ancien mot de passe est incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('client.profile')->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $user = Auth::guard('client')->user();

        // Optionnel : vérifier mot de passe avant suppression ici

        Auth::guard('client')->logout();
        $user->delete();

        return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}
