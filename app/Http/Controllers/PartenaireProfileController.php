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
            'nom_entreprise' => ['required', 'string', 'max:255', 'unique:partenaires,nom_entreprise'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:partenaires,email'],
            'telephone' => ['required', 'phone:CI,FR,US', 'max:20', 'unique:partenaires,telephone'],
            'adresse' => ['required', 'string', 'max:200'],
            'siteWeb' => ['nullable', 'url', 'max:100', 'unique:partenaires,siteWeb'],
            'AcceptT&C' => ['required', 'accepted'],
            // Tu peux décommenter si nécessaire :
            // 'statut' => ['required', 'string', 'max:100'],
            'photo_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
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
