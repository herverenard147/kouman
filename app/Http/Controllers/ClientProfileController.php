<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class ClientProfileController extends Controller
{
    public function edit()
    {
        $client = Auth::guard('client')->user();
        // dd($client); // Debugging line, remove in production
        return view('client.profile-setting', compact('client'));
    }

    public function ordersHistory()
    {
        $user = auth('client')->user();

        $orders = Order::where('client_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('client.profile.orders_history', compact('orders'));
    }

    public function update(Request $request)
    {
        // dd($request->all()); // Debugging line, remove in production
        $client = Auth::guard('client')->user();

        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'profession' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'telephone' => 'nullable|string|max:20|unique:clients,telephone,' . $client->id,
            'url' => 'nullable|url',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string',
            'genre' => 'nullable|in:homme,femme,autre',
            'langue_preferee' => 'nullable|in:fr,en,es',
            'code_postal' => 'nullable|string|max:20',  // tu peux ajuster max selon besoin
            'pays' => 'nullable|string|max:255',
        ], [
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne doit pas dépasser :max caractères.',

            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser :max caractères.',

            'email.required' => 'L’adresse email est obligatoire.',
            'email.email' => 'L’adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'profession.max' => 'La profession ne doit pas dépasser :max caractères.',

            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser :max caractères.',

            'url.url' => 'Le site web doit être une URL valide.',

            'genre.in' => 'Le genre doit être "homme", "femme" ou "autre".',

            'langue_preferee.in' => 'La langue préférée doit être "fr", "en" ou "es".',

            'code_postal.max' => 'Le code postal ne doit pas dépasser :max caractères.',

            'pays.max' => 'Le nom du pays ne doit pas dépasser :max caractères.',
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
