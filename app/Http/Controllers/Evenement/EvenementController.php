<?php

namespace App\Http\Controllers\Evenement;


use App\Models\Equipement;
use App\Models\Evenement;
use App\Models\ImageEvenement;
use App\Models\Localisation;
use App\Models\EvenementDate;
use App\Models\Localisations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class EvenementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partenaire');
    }

    public function index()
    {
        $evenements = Evenement::where('idPartenaire', Auth::guard('partenaire')->id())->with('images')->get();
        dd($evenements);
        return view('screens.add.evenement.evenement-list', compact('evenements'));
        // return response()->file(resource_path('views/screens/add/Evenement/hebergement.blade.php'));

    }

    public function createEvenement()
    {
        $equipements = Equipement::all();
        return view('screens.add.evenement.evenement-add', compact('equipements'));
    }

   public function storeEvenement(Request $request)
    {
        $partenaire = Auth::guard('partenaire')->user();

        // Validation
        $validated = $request->validate([
            'titre' => [
                'required',
                'string',
                'max:150',
                Rule::unique('evenements')->where('id', $partenaire->idPartenaire),
            ],
            'description' => 'nullable|string',
            'date' => 'nullable|date|after_or_equal:today',
            'heure_debut' => [
                'nullable',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->date === now()->toDateString() && $value < now()->format('H:i')) {
                        $fail("L'heure de début doit être postérieure à l'heure actuelle.");
                    }
                },
            ],
            'duree' => 'required|numeric|min:0.5|max:24',
            'prix' => 'required|numeric|min:0',
            'devise' => 'required|in:CFA,EUR,USD,GBP,CAD,AUD',
            'capacite_max' => 'required|integer|min:1',
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'equipements' => 'nullable|array',
            'equipements.*' => 'exists:equipements,idEquipement',
            'telephones.*.numero' => 'nullable|string|max:20',
            'images.*' => 'nullable|image|mimes:jpeg,png|max:10240',
        ]);

        // Création de l'evenement
        $evenement = Evenement::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'] ?? null,
            'date' => $validated['date'] ?? null,
            'heure_debut' => $validated['heure_debut'] ?? null,
            'duree' => $validated['duree'],
            'prix' => $validated['prix'],
            'devise' => $validated['devise'],
            'capacite_max' => $validated['capacite_max'],
            'idPartenaire' => $partenaire->idPartenaire,
            'statut' => 'brouillon',
        ]);

        // Sauvegarde des numéros de téléphone
        foreach ($request->input('telephones', []) as $telData) {
            if (!empty($telData['numero'])) {
                $evenement->telephones()->create([
                    'numero' => $telData['numero']
                ]);
            }
        }

        // Sauvegarde localisation
        if ($request->filled(['ville', 'pays', 'adresse'])) {
            $localisation = Localisations::create([
                'ville' => $request->ville,
                'pays' => $request->pays,
                'adresse' => $request->adresse,
            ]);
            $evenement->localisation_id = $localisation->idLocalisation;
            $evenement->save();
        }

        // Création des dates disponibles
        if ($request->date) {
            EvenementDate::create([
                'idEvenement' => $evenement->id,
                'date' => $request->date,
                'heure_debut' => $request->heure_debut,
                'places_disponibles' => $request->capacite_max,
            ]);
        }

        // Équipements
        if ($request->has('equipements')) {
            $evenement->equipements()->attach($request->equipements);
        }

        // Images
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            if (count($images) > 10) {
                return back()->withErrors(['images' => 'Vous ne pouvez pas ajouter plus de 10 images.'])->withInput();
            }

            foreach ($images as $index => $image) {
                $path = $image->store('evenements', 'public');
                ImageEvenement::create([
                    'idEvenement' => $evenement->id,
                    'url' => $path,
                    'estPrincipale' => $index === 0,
                ]);
            }
        }

        return redirect()->route('partenaire.add.evenement')->with('success', 'Evenement ajoutée avec succès.');
    }

}
