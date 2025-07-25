<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('client.auth.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     // dd('benvenue dans la méthode store de RegisteredPartenaireController');
    //     $request->validate([
    //         'nom_entreprise' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:'.Partenaire::class],
    //         'mot_de_passe' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'type' => ['required', 'string', 'max:100'],
    //         'téléphone' => ['required', 'string', 'max:100'],
    //         'adresse' => ['required', 'string', 'max:100'],
    //         'siteWeb' => ['required', 'string', 'max:100'],
    //         // 'statut' => ['required', 'string', 'max:100'],
    //     ]);

    //     $partenaire = Partenaire::create([
    //         'nom_entreprise' => $request->nom_entreprise,
    //         'email' => $request->email,
    //         'mot_de_passe' => Hash::make($request->password),
    //         'type'=> $request->type,
    //         'téléphone' => $request->téléphone,
    //         'adresse' => $request->adresse,
    //         'siteWeb' => $request->siteWeb,
    //         'statut' => $request->statut,
    //     ]);

    //     dd($partenaire);
    //     event(new Registered($partenaire));

    //     Auth::guard('partenaire')->login($partenaire);

    //     return redirect(route(name: 'partenaire.dashboard', absolute: false));
    // }
  public function store(Request $request): RedirectResponse
{
    try {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:clients,email'],
            'telephone' => ['nullable', 'string', 'max:20', 'unique:clients,telephone'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'genre' => ['nullable', 'in:homme,femme,autre'],
            'date_naissance' => ['nullable', 'date'],
            'pays' => ['nullable', 'string', 'max:100'],
            'adresse' => ['nullable', 'string', 'max:100'],
            'ville' => ['nullable', 'string', 'max:100'],
            'code_postal' => ['nullable', 'string', 'max:20'],
            'langue_preferee' => ['nullable', 'string', 'max:10'],
            'photo_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'accept' => ['required', 'accepted'],
        ], [
            'nom.required' => 'Le nom est requis.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne peut pas dépasser 100 caractères.',

            'prenom.required' => 'Le prénom est requis.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne peut pas dépasser 100 caractères.',

            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'email.max' => 'L\'adresse e-mail ne peut pas dépasser 100 caractères.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

            'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',

            'password.required' => 'Le mot de passe est requis.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            // Les autres règles Password::defaults() génèrent leurs propres messages selon la config de Laravel

            'genre.in' => 'Le genre doit être "homme", "femme" ou "autre".',

            'date_naissance.date' => 'La date de naissance doit être une date valide.',

            'pays.string' => 'Le pays doit être une chaîne de caractères.',
            'pays.max' => 'Le pays ne peut pas dépasser 100 caractères.',

            'ville.string' => 'La ville doit être une chaîne de caractères.',
            'ville.max' => 'La ville ne peut pas dépasser 100 caractères.',

            'code_postal.string' => 'Le code postal doit être une chaîne de caractères.',
            'code_postal.max' => 'Le code postal ne peut pas dépasser 20 caractères.',

            'langue_preferee.string' => 'La langue préférée doit être une chaîne de caractères.',
            'langue_preferee.max' => 'La langue préférée ne peut pas dépasser 10 caractères.',

            'photo_profil.image' => 'Le fichier doit être une image.',
            'photo_profil.mimes' => 'L\'image doit être au format jpg, jpeg ou png.',
            'photo_profil.max' => 'La taille de l\'image ne peut pas dépasser 2 Mo.',

            'accept.required' => 'Vous devez accepter les conditions.',
            'accept.accepted' => 'Vous devez accepter les conditions.',
        ]);

        // Upload de la photo de profil si fournie
        $photoProfil = null;
        if ($request->hasFile('photo_profil')) {
            $photoProfil = $request->file('photo_profil')->store('clients/profils', 'public');
        }

        // Création du client
        $client = Client::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'] ?? null,
            'password' => Hash::make($validated['password']),
            'genre' => $validated['genre'] ?? null,
            'date_naissance' => $validated['date_naissance'] ?? null,
            'pays' => $validated['pays'] ?? null,
            'adresse' => $validated['adresse'] ?? null,
            'ville' => $validated['ville'] ?? null,
            'code_postal' => $validated['code_postal'] ?? null,
            // 'langue_preferee' => $validated['langue_preferee'] ?? null,
            'photo_profil' => $photoProfil,
        ]);

        event(new Registered($client));

        // Connexion automatique
        Auth::guard('client')->login($client);

        return redirect()->route('client.index')->with('success', 'Inscription réussie !');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('Erreur lors de l\'inscription client : ' . $e->getMessage());
        return back()->with('error', 'Une erreur est survenue lors de l\'inscription.')->withInput();
    }
}

}
