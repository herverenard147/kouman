<?php

namespace App\Http\Controllers\Auth\Partenaire;

use Illuminate\View\View;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredPartenaireController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
    //         'telephone' => ['required', 'string', 'max:100'],
    //         'adresse' => ['required', 'string', 'max:100'],
    //         'siteWeb' => ['required', 'string', 'max:100'],
    //         // 'statut' => ['required', 'string', 'max:100'],
    //     ]);

    //     $partenaire = Partenaire::create([
    //         'nom_entreprise' => $request->nom_entreprise,
    //         'email' => $request->email,
    //         'mot_de_passe' => Hash::make($request->password),
    //         'type'=> $request->type,
    //         'telephone' => $request->telephone,
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
        // dd($request->all());
        try {
            $validated = $request->validate([
                'nom_entreprise' => ['required', 'string', 'max:255', 'unique:partenaires,nom_entreprise'],
                'email' => ['required', 'string', 'email', 'max:100', 'unique:partenaires,email'],
                'mot_de_passe' => ['required', 'confirmed', Rules\Password::defaults()],
                'type' => 'required|in:hotel,agence_voyage,compagnie_aerienne,residence',
                'telephone' => ['required', 'phone:CI,FR,US', 'max:20', 'unique:partenaires,telephone'],
                'adresse' => ['required', 'string', 'max:200'],
                'siteWeb' => ['nullable', 'url', 'max:100', 'unique:partenaires,siteWeb'],
                'AcceptT&C' => ['required', 'accepted'],
                // Tu peux décommenter si nécessaire :
                // 'statut' => ['required', 'string', 'max:100'],
                'photo_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ], [
                // Messages personnalisés en français
                'nom_entreprise.required' => 'Le nom de l\'entreprise est requis.',
                'nom_entreprise.string' => 'Le nom de l\'entreprise doit être une chaîne de caractères.',
                'nom_entreprise.max' => 'Le nom de l\'entreprise ne doit pas dépasser 255 caractères.',

                'email.required' => 'L\'adresse email est requise.',
                'email.string' => 'L\'adresse email doit être une chaîne de caractères.',
                'email.email' => 'L\'adresse email doit être valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser 100 caractères.',
                'email.unique' => 'Cet email est déjà utilisé.',

                'mot_de_passe.required' => 'Le mot de passe est requis.',
                'mot_de_passe.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
                'mot_de_passe.min' => 'Le mot de passe doit contenir au moins :min caractères.', // :min sera remplacé par la valeur de Rules\Password::defaults()

                'type.required' => 'Le type de partenaire est requis.',
                'type.string' => 'Le type de partenaire doit être une chaîne de caractères.',
                'type.max' => 'Le type de partenaire ne doit pas dépasser 100 caractères.',

                'telephone.required' => 'Le numéro de telephone est requis.',
                'telephone.string' => 'Le numéro de telephone doit être une chaîne de caractères.',
                'telephone.max' => 'Le numéro de telephone ne doit pas dépasser 100 caractères.',
                'telephone.unique' => 'Ce numéro de telephone est déjà utilisé.',

                'adresse.required' => 'L\'adresse est requise.',
                'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',
                'adresse.max' => 'L\'adresse ne doit pas dépasser 200 caractères.',

                'siteWeb.required' => 'L\'URL du site web est requise.',
                'siteWeb.url' => 'L\'URL du site web doit être valide (ex. https://exemple.com).',
                'siteWeb.max' => 'L\'URL du site web ne doit pas dépasser 100 caractères.',
                'siteWeb.unique' => 'Cet URL est déjà utilisé.',

                'AcceptT&C.required' => 'Vous devez accepter les termes et conditions.',
                'AcceptT&C.accepted' => 'Vous devez accepter les termes et conditions.',

                'photo_profil.image' => 'Le fichier doit être une image.',
                'photo_profil.mimes' => 'L\'image doit être au format jpg, jpeg ou png.',
                'photo_profil.max' => 'La taille de l\'image ne peut pas dépasser 2 Mo.',
            ]);

            // Upload de la photo de profil si fournie
            $photoProfil = null;
            if ($request->hasFile('photo_profil')) {
                $photoProfil = $request->file('photo_profil')->store('clients/profils', 'public');
            }

            // Création du partenaire
            $partenaire = Partenaire::create([
                'nom_entreprise' => $validated['nom_entreprise'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['mot_de_passe']),
                'type'=> $validated['type'],
                'telephone' => $validated['telephone'],
                'adresse' => $validated['adresse'],
                'siteWeb' => $validated['siteWeb'],
                'statut' => $request->statut ?? 'en_attente', // Valeur par défaut si
                'photo_profil' => $photoProfil,

            ]);
            // dd($partenaire);

            // dd($partenaire);
            // Lancer l’événement Registered si besoin (facultatif)
            event(new Registered($partenaire));

            // Connexion automatique après enregistrement
            Auth::guard('partenaire')->login($partenaire);

            // Redirection vers le tableau de bord du partenaire
            return redirect()->route('partenaire.dashboard')->with('success', 'Inscription réussie !');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // dd($e->errors());
            return back()
                ->withErrors( $e->errors())
                ->withInput();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            // Log l'erreur pour le dev
            Log::error('Erreur lors de l\'inscription du partenaire : ' . $e->getMessage());

            return back()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.')
                ->withInput();
        }
    }

}
