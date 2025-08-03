<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartenaireProfileController extends Controller
{
    public function edit()
    {
        $partenaire = Auth::guard('partenaire')->user();
        return view('screens.profile-setting', compact('partenaire'));
    }

    public function update(Request $request)
    {
        $partenaire = Auth::guard('partenaire')->user();

        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:partenaires,email,' . $partenaire->id,
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'url' => 'nullable|url',
            'genre' => 'nullable|in:homme,femme,autre',
            'langue_preferee' => 'nullable|in:fr,en,es',
            'code_postal' => 'nullable|string|max:20',  // tu peux ajuster max selon besoin
            'pays' => 'nullable|string|max:255',
        ]);

        $partenaire->update($validated);

        return redirect()->route('partenaire.profile')->with('success', 'Profil mis à jour avec succès.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);

        $partenaire = Auth::guard('partenaire')->user();

        if (!Hash::check($request->old_password, $partenaire->password)) {
            return redirect()->route('partenaire.profile')->withErrors(['old_password' => 'L\'ancien mot de passe est incorrect.']);
        }

        $partenaire->password = Hash::make($request->new_password);
        $partenaire->save();

        return redirect()->route('partenaire.profile')->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $partenaire = Auth::guard('partenaire')->user();

        // Optionnel : vérifier mot de passe avant suppression ici

        Auth::guard('partenaire')->logout();
        $partenaire->delete();

        return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}
