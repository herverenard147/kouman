<?php

namespace App\Http\Controllers\Auth\Client;

use Illuminate\View\View;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.client.signup');
    }

  public function store(Request $request): JsonResponse
{
    logger($request->all());
    try {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'prenom' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:clients,email'],
            'phone' => ['nullable', 'string', 'max:20', 'unique:clients,phone'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'genre' => ['nullable', 'in:homme,femme,autre'],
            'birthDate' => ['nullable', 'date'],
            'identityNumber' => ['nullable', 'string', 'max:100', 'unique:clients,identityNumber'],
            // 'pays' => ['nullable', 'string', 'max:100'],
            // 'adresse' => ['nullable', 'string', 'max:100'],
            // 'ville' => ['nullable', 'string', 'max:100'],
            // 'code_postal' => ['nullable', 'string', 'max:20'],
            // 'langue_preferee' => ['nullable', 'string', 'max:10'],
            // 'photo_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'acceptTerms' => ['required', 'accepted'],
        ], [
            'name.required' => 'Le nom est requis.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 100 caractères.',

            // 'prenom.required' => 'Le prénom est requis.',
            // 'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            // 'prenom.max' => 'Le prénom ne peut pas dépasser 100 caractères.',

            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'email.max' => 'L\'adresse e-mail ne peut pas dépasser 100 caractères.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

            'identityNumber.string' => 'Le numéro d\'identité doit être une chaîne de caractères.',
            'identityNumber.max' => 'Le numéro d\'identité ne peut pas dépasser 100 caractères.',
            'identityNumber.unique' => 'Ce numéro d\'identité est déjà utilisé.',


            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',

            'password.required' => 'Le mot de passe est requis.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            // Les autres règles Password::defaults() génèrent leurs propres messages selon la config de Laravel

            // 'genre.in' => 'Le genre doit être "homme", "femme" ou "autre".',

            'birthDate.date' => 'La date de naissance doit être une date valide.',

            // 'pays.string' => 'Le pays doit être une chaîne de caractères.',
            // 'pays.max' => 'Le pays ne peut pas dépasser 100 caractères.',

            // 'ville.string' => 'La ville doit être une chaîne de caractères.',
            // 'ville.max' => 'La ville ne peut pas dépasser 100 caractères.',

            // 'code_postal.string' => 'Le code postal doit être une chaîne de caractères.',
            // 'code_postal.max' => 'Le code postal ne peut pas dépasser 20 caractères.',

            // 'langue_preferee.string' => 'La langue préférée doit être une chaîne de caractères.',
            // 'langue_preferee.max' => 'La langue préférée ne peut pas dépasser 10 caractères.',

            // 'photo_profil.image' => 'Le fichier doit être une image.',
            // 'photo_profil.mimes' => 'L\'image doit être au format jpg, jpeg ou png.',
            // 'photo_profil.max' => 'La taille de l\'image ne peut pas dépasser 2 Mo.',

            'accept.required' => 'Vous devez accepter les conditions.',
            'accept.accepted' => 'Vous devez accepter les conditions.',
        ]);

        // Upload de la photo de profil si fournie
        // $photoProfil = null;
        // if ($request->hasFile('photo_profil')) {
        //     $photoProfil = $request->file('photo_profil')->store('clients/profils', 'public');
        // }

        // Création du client
        $client = Client::create([
            'acceptTerms' => $validated['acceptTerms'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'birthDate' => $validated['birthDate'] ?? null,
            'identityNumber' => $validated['identityNumber'] ?? null,

            // 'prenom' => $validated['prenom'],
            // 'genre' => $validated['genre'] ?? null,
            // 'pays' => $validated['pays'] ?? null,
            // 'adresse' => $validated['adresse'] ?? null,
            // 'ville' => $validated['ville'] ?? null,
            // 'code_postal' => $validated['code_postal'] ?? null,
            // 'langue_preferee' => $validated['langue_preferee'] ?? null,
            // 'photo_profil' => $photoProfil,
        ]);
        $token = $client->createToken('auth_token')->plainTextToken;
        event(new Registered($client));
        Auth::guard('client')->login($client);

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'message' => 'Inscription réussie',
            'client' => $client,
            'user_type' => 'client'
        ], 201);

    } catch (ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Erreur de validation',
            'errors' => $e->errors(), // ici tu récupères bien tes messages personnalisés
        ], 422);
    } catch (\Exception $e) {
        Log::error('Erreur inscription client', ['exception' => $e]);

        return response()->json([
            'status' => 'error',
            'message' => 'Une erreur interne est survenue. Veuillez réessayer.',
        ], 500);
    }
}

}
