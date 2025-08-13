<?php

namespace App\Http\Controllers\Excursion;


use App\Models\Equipement;
use App\Models\EquipementExcursion;
use App\Models\Excursion;
use App\Models\ImageExcursion;
use App\Models\Langue;
use App\Models\Localisation;
use App\Models\ExcursionDate;
use App\Models\LocalisationArrives;
use App\Models\Localisations;
use App\Models\MoyenPaiement;
use App\Models\PolitiquesAnnulation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ExcursionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partenaire');
    }

     public function index()
    {
        $excursions = Excursion::with(['partenaire', 'localisation', 'avis'])->paginate(6);
        // $serviceIds = $excursions->flatMap(function ($excursion) {
        //     return $excursion->avis->pluck('idExcursion');
        // })->unique()->values();
        // dd($excursions);
        return view('screens.add.excursion.excursion', compact('excursions'));
    }

    public function createExcursion()
    {
        $equipements = Equipement::whereIn('type', ['excursion', 'inclus', 'optionnel'])->orWhereNull('type')->get();
        $politiques = PolitiquesAnnulation::all();
        $moyensPaiements = MoyenPaiement::all();
        $langues = Langue::all();
        return view('screens.add.excursion.excursion-add', compact(
            'equipements',
            'politiques',
            'langues',
            'moyensPaiements'
        ));
    }


    public function storeExcursion(Request $request)
    {
        // dd($request->allFiles());
        $partenaire = Auth::guard('partenaire')->user();
        if ($request->filled('langues') && is_string($request->langues)) {
            $request->merge([
                'langues' => explode(',', $request->langues),
            ]);
        }
        $validated = $request->validate([
            'titre' => [
                'required', 'string', 'max:150',
                Rule::unique('excursions')->where('id', $partenaire->idPartenaire),
            ],
            'description' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'heure_debut' => [
                'required', 'date_format:H:i',
            ],
            'duree' => 'required|numeric|min:0.5|max:24',
            'statut' => 'required|in:brouillon,active,annulee',
            'prix' => 'required|numeric|min:0',
            'devise' => 'required|in:CFA,EUR,USD,GBP,CAD,AUD',
            'capacite_max' => 'required|integer|min:1',

            'depart_ville' => 'nullable|string|max:255',
            'depart_pays' => 'nullable|string|max:255',
            'depart_adresse' => 'required|string|max:255',
            'depart_codePostal' => 'nullable|string|max:20',
            'depart_latitude' => 'nullable|string|max:255',
            'depart_longitude' => 'nullable|string|max:255',

            'arrive_ville' => 'nullable|string|max:255',
            'arrive_pays' => 'nullable|string|max:255',
            'arrive_adresse' => 'required|string|max:255',
            'arrive_codePostal' => 'nullable|string|max:20',
            'arrive_latitude' => 'nullable|string|max:255',
            'arrive_longitude' => 'nullable|string|max:255',

            // 'equipements' => 'nullable|array',
            'equipements.*.nom' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png|max:10240',
            'itineraire' => 'nullable|string',
            'nom_guide' => 'nullable|string|max:150',

            // Validation pour un tableau d'IDs de langues
            'langues' => 'nullable|array',
            'langues.*' => 'exists:langues,id',
            'recurrence' => 'nullable|in:ponctuelle,quotidienne,hebdomadaire,mensuelle',
            'age_minimum' => 'nullable|integer|min:0',
            'conditions' => 'nullable|string',
            'paiements' => 'nullable|array',
            'paiements.*' => 'string|max:50',
            'moyens_paiement' => 'nullable|string',
            'telephones.*.numero' => ['required', 'phone:CI,FR,US', 'distinct', 'max:20'],
        ],
[
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.max' => 'Le titre ne doit pas dépasser 150 caractères.',
            'titre.unique' => 'Ce titre existe déjà pour ce partenaire.',

            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date doit être une date valide.',
            'date.after_or_equal' => 'La date doit être aujourd’hui ou ultérieure.',

            'heure_debut.required' => 'L’heure de début est obligatoire.',
            'heure_debut.date_format' => 'L’heure doit être au format HH:MM.',

            'duree.required' => 'La durée est obligatoire.',
            'duree.numeric' => 'La durée doit être un nombre.',
            'duree.min' => 'La durée minimale est de 0,5 heure.',
            'duree.max' => 'La durée maximale est de 24 heures.',

            'prix.required' => 'Le prix est obligatoire.',
            'prix.numeric' => 'Le prix doit être un nombre.',
            'prix.min' => 'Le prix doit être supérieur ou égal à 0.',

            'devise.required' => 'La devise est obligatoire.',
            'devise.in' => 'La devise doit être CFA, EUR, USD, GBP, CAD ou AUD.',

            'capacite_max.required' => 'La capacité maximale est obligatoire.',
            'capacite_max.integer' => 'La capacité maximale doit être un entier.',
            'capacite_max.min' => 'La capacité minimale est de 1.',

            'depart_adresse.required' => 'L’adresse de départ est obligatoire.',
            'arrive_adresse.required' => 'L’adresse d’arrivée est obligatoire.',

            'equipements.*.nom.required' => 'Le nom de chaque équipement est obligatoire.',
            'equipements.*.nom.string' => 'Le nom de l’équipement doit être une chaîne de caractères.',
            'equipements.*.nom.max' => 'Le nom de l’équipement ne doit pas dépasser 255 caractères.',

            'images.*.required' => 'Chaque image est obligatoire.',
            'images.*.image' => 'Le fichier doit être une image.',
            'images.*.mimes' => 'L’image doit être au format jpeg ou png.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 10 Mo.',

            'langues.array' => 'Les langues doivent être envoyées sous forme de tableau.',
            'langues.*.exists' => 'La langue sélectionnée est invalide.',

            'recurrence.in' => 'La récurrence doit être ponctuelle, quotidienne, hebdomadaire ou mensuelle.',

            'age_minimum.integer' => 'L’âge minimum doit être un entier.',
            'age_minimum.min' => 'L’âge minimum ne peut pas être négatif.',

            'paiements.array' => 'Les paiements doivent être envoyés sous forme de tableau.',
            'paiements.*.string' => 'Chaque mode de paiement doit être une chaîne de caractères.',
            'paiements.*.max' => 'Chaque mode de paiement ne doit pas dépasser 50 caractères.',

            'telephones.*.numero.required' => 'Chaque numéro de téléphone est obligatoire.',
            'telephones.*.numero.phone' => 'Le numéro de téléphone doit être valide pour CI, FR ou US.',
            'telephones.*.numero.distinct' => 'Chaque numéro de téléphone doit être unique.',
            'telephones.*.numero.max' => 'Chaque numéro de téléphone ne doit pas dépasser 20 caractères.',
        ]);

        $localisationDepart = null;
        if (!empty(array_filter([
            'ville' => $request->depart_ville,
            'pays' => $request->depart_pays,
            'adresse' => $request->depart_adresse,
            'codePostal' => $request->depart_codePostal,
            'latitude' => $request->depart_latitude,
            'longitude' => $request->depart_longitude,
        ]))) {
            $localisationDepart = Localisations::create([
                'ville' => $request->depart_ville,
                'pays' => $request->depart_pays,
                'adresse' => $request->depart_adresse,
                'codePostal' => $request->depart_codePostal,
                'latitude' => $request->depart_latitude,
                'longitude' => $request->depart_longitude,
            ]);
        }

        // 2. Création localisation arrivée
        $localisationArrivee = null;
        if (!empty(array_filter([
            'ville' => $request->arrive_ville,
            'pays' => $request->arrive_pays,
            'adresse' => $request->arrive_adresse,
            'codePostal' => $request->arrive_codePostal,
            'latitude' => $request->arrive_latitude,
            'longitude' => $request->arrive_longitude,
        ]))) {
            $localisationArrivee = LocalisationArrives::create([
                'ville' => $request->arrive_ville,
                'pays' => $request->arrive_pays,
                'adresse' => $request->arrive_adresse,
                'codePostal' => $request->arrive_codePostal,
                'latitude' => $request->arrive_latitude,
                'longitude' => $request->arrive_longitude,
            ]);
        }

        $excursion = Excursion::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'duree' => $validated['duree'],
            'prix' => $validated['prix'],
            'devise' => $validated['devise'],
            'capacite_max' => $validated['capacite_max'],
            'partenaire_id' => $partenaire->id,
            'statut' => $validated['statut'],
            'itineraire' => $request->itineraire,
            'nom_guide' => $request->nom_guide,
            // 'langues' => $request->filled('langues') ? implode(',', $request->langues) : 'français',
            'recurrence' => $request->recurrence ?? 'ponctuelle',
            'age_minimum' => $request->age_minimum ?? 0,
            'conditions' => $request->conditions,
            'moyens_paiement' => $request->moyens_paiement,
            'localisation_id' => $localisationDepart ? $localisationDepart->id : null,
            'localisation_idA' => $localisationArrivee ? $localisationArrivee->id : null,
        ]);

        if ($request->filled('langues')) {
            $excursion->langues()->sync($request->langues);
        }

        foreach ($request->input('telephones', []) as $telData) {
            $excursion->telephones()->create([
                'numero' => $telData['numero']
            ]);
        }

        foreach ($request->input('equipements', []) as $equipData) {
            $excursion->equipements()->create([
                'nom' => $equipData['nom']
            ]);
        }

        // $localisationData = array_filter([
        //     'ville' => $request->depart_ville,
        //     'pays' => $request->depart_pays,
        //     'adresse' => $request->depart_adresse,
        //     'codePostal' => $request->depart_codePostal,
        //     'latitude' => $request->depart_latitude,
        //     'longitude' => $request->depart_longitude,
        // ]);
        // if (!empty($localisationData)) {
        //     $localisation = $excursion->localisation()->create($localisationData);
        //     $excursion->localisation_id = $localisation->idLocalisation;

        // }

        // $localisationData1 = array_filter([
        //     'ville' => $request->arrive_ville,
        //     'pays' => $request->arrive_pays,
        //     'adresse' => $request->arrive_adresse,
        //     'codePostal' => $request->arrive_codePostal,
        //     'latitude' => $request->arrive_latitude,
        //     'longitude' => $request->arrive_longitude,
        // ]);
        // if (!empty($localisationData1)) {
        //     $localisation = $excursion->localisationArrivee()->create($localisationData1);
        //     $excursion->localisation_idA = $localisation->idLocalisation;
        // }
        // $excursion->save();

        ExcursionDate::create([
            'idExcursion' => $excursion->id,
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'places_disponibles' => $request->capacite_max,
        ]);

        // EquipementExcursion::create([
        //     'idExcursion' => $excursion->id,
        //     'nom' => $request->equipement_id,
        // ]);

        // if ($request->equipements) {
        //     $excursion->equipements()->attach($request->equipements);
        // }

        if ($request->hasFile('images')) {
            $newImages = $request->file('images');
            if (count($newImages) > 10) {
                return back()->withErrors(['images' => 'Vous ne pouvez pas ajouter plus de 10 images.'])->withInput();
            }

            foreach ($newImages as $index => $image) {
                $path = $image->store('excursions', 'public');
                ImageExcursion::create([
                    'idExcursion' => $excursion->id,
                    'url' => $path,
                    'estPrincipale' => $index === 0,
                ]);
            }
        } else {
            Log::info('Aucune image reçue dans la requête.', ['files' => $request->allFiles()]);
        }

        return redirect()->route('partenaire.excursion')->with('success', 'Excursion ajoutée avec succès.');
    }


    public function edit(Excursion $excursion)
    {
        // $this->authorize('update', $excursion); // facultatif

        $excursion = Excursion::with(['equipements', 'localisation'])->findOrFail($excursion->id);
        $equipements = Equipement::all();
        return view('partenaire.excursion-detail.edit', compact('excursion', 'equipements'));
    }



    public function update(Request $request, $id)
    {
        $excursion = Excursion::findOrFail($id);

        $validated = $request->validate([
            'titre' => [
                'required', 'string', 'max:150',
                Rule::unique('excursions')->ignore($id)
            ],
            'description' => 'nullable|string',
            'duree' => 'required|numeric|min:0.5|max:24',
            'prix' => 'required|numeric|min:0',
            'devise' => 'required|in:CFA,EUR,USD,GBP,CAD,AUD',
            'capacite_max' => 'required|integer|min:1',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'itineraire' => 'nullable|string',
            'nom_guide' => 'nullable|string|max:150',
            'langues' => 'nullable|array',
            'langues.*' => 'string|max:50',
            'recurrence' => 'nullable|in:ponctuelle,quotidienne,hebdomadaire,mensuelle',
            'age_minimum' => 'nullable|integer|min:0',
            'conditions' => 'nullable|string',
            'statut' => 'nullable|string',
            'paiements' => 'nullable|array',
            'paiements.*' => 'string|max:50',
            'equipements' => 'nullable|array',
            'equipements.*' => 'exists:equipements,idEquipement',
            'images.*' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        $excursion->update([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'duree' => $validated['duree'],
            'prix' => $validated['prix'],
            'devise' => $validated['devise'],
            'capacite_max' => $validated['capacite_max'],
            'itineraire' => $request->itineraire,
            'nom_guide' => $request->nom_guide,
            'langues' => $request->filled('langues') ? implode(',', $request->langues) : null,
            'recurrence' => $request->recurrence ?? 'ponctuelle',
            'age_minimum' => $request->age_minimum ?? 0,
            'conditions' => $request->conditions,
            'moyens_paiement' => $request->filled('paiements') ? implode(',', $request->paiements) : null,
        ]);

        // Mise à jour localisation
        if ($excursion->localisation) {
            $excursion->localisation->update([
                'ville' => $request->ville,
                'pays' => $request->pays,
                'adresse' => $request->adresse,
            ]);
        }

        // Équipements
        $excursion->equipements()->sync($request->equipements ?? []);

        // Images supplémentaires
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('excursions', 'public');
                ImageExcursion::create([
                    'idExcursion' => $excursion->id,
                    'url' => $path,
                    'estPrincipale' => false,
                ]);
            }
        }

        return redirect()->route('partenaire.excursion')->with('success', 'Excursion mise à jour avec succès.');
    }


    public function destroy($id)
    {
        $excursion = Excursion::with('images')->findOrFail($id);

        // Supprimer les images du stockage
        foreach ($excursion->images as $image) {
            if (Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }
            $image->delete();
        }

        // Supprimer les relations (si contraintes manuelles)
        $excursion->equipements()->detach();
        $excursion->dates()->delete();

        $excursion->delete();

        return redirect()->route('partenaire.excursion')->with('success', 'Excursion supprimée avec succès.');
    }



}
