<?php

namespace App\Http\Controllers\Chambre;


use App\Models\Equipement;
use App\Models\Chambre;
use App\Models\ImageChambre;
use App\Models\Localisation;
use App\Models\ChambreDate;
use App\Models\ImagesChambre;
use App\Models\Localisations;
use App\Models\PolitiquesAnnulation;
use App\Models\TypeChambre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ChambreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:partenaire');
    }

    //  public function index()
    // {
    //     $chambres = Chambre::with(['partenaire', 'localisation', 'avis'])->paginate(10);
    //     // $serviceIds = $chambres->flatMap(function ($chambre) {
    //     //     return $chambre->avisClients->pluck('service_id');
    //     // })->unique()->values();
    //     return view('screens.add.chambre.chambre-list', compact('chambres'));
    // }

    // public function create()
    // {
    //     $equipements = Equipement::whereIn('type', ['chambre', 'inclus', 'optionnel'])->orWhereNull('type')->get();
    //     $localisations = Localisations::all();
    //     $politiques = PolitiquesAnnulation::all();
    //     return view('screens.add.chambre.chambre-add', compact(
    //         'equipements',
    //         'localisations',
    //         'politiques'
    //     ));
    // }


    /**
     * Affiche la liste des chambres du partenaire connecté.
     */
    public function index()
    {
        $chambres = Chambre::where('idPartenaire', Auth::guard('partenaire')->id())
            ->with(['type', 'localisation', 'politiqueAnnulation', 'images'])
            ->get();

        return view('screens.add.chambre.chambre', compact('chambres'));
    }

    /**
     * Formulaire de création d’une chambre.
     */
    public function create()
    {
        $typesChambres = TypeChambre::all();
        $localisations = Localisations::all();
        $politiquesAnnulation = PolitiquesAnnulation::all();

        return view('screens.add.chambre.chambre-add', compact('typesChambres', 'localisations', 'politiquesAnnulation'));
    }



    public function store(Request $request)
    {
        $partenaire = Auth::guard('partenaire')->user();

        // Vérifier que le partenaire est un hôtel
        if ($partenaire->type !== 'hotel') {
            abort(403, 'Seuls les partenaires de type hôtel peuvent enregistrer des chambres.');
        }

        // Validation des données
        $validated = $request->validate([
            'numero' => [
                'required', 'string', 'max:150',
                Rule::unique('chambres')->where(function ($query) use ($partenaire) {
                    return $query->where('idPartenaire', $partenaire->id);
                }),
            ],
            'description' => 'nullable|string',
            'prixParNuit' => 'required|numeric|min:0',
            'devise' => 'required|in:CFA,EUR,USD,GBP,CAD,AUD',
            'stock' => 'required|integer|min:1',
            'capaciteMax' => 'required|integer|min:1',
            'nombreLits' => 'required|integer|min:1',
            'nombreSallesDeBain' => 'nullable|integer|min:0',
            'surface' => 'nullable|numeric|min:0',
            'statut' => 'required|in:disponible,indisponible',
            'idTypeChambre' => 'required|exists:types_chambres,id',
            'idPolitiqueAnnulation' => 'nullable|exists:politiques_annulation,id',

            // Localisation
            'ville' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',

            // Équipements
            'equipements' => 'nullable|array',
            'equipements.*' => 'exists:equipements,id',

            // Images
            'images.*' => 'nullable|image|mimes:jpeg,png|max:10240',
        ],
[
            'numero.required' => 'Le numéro ou nom de la chambre est obligatoire.',
            'numero.string' => 'Le numéro ou nom de la chambre doit être une chaîne de caractères.',
            'numero.max' => 'Le numéro ou nom de la chambre ne peut pas dépasser 150 caractères.',
            'numero.unique' => 'Ce numéro de chambre existe déjà pour cet hôtel.',

            'description.string' => 'La description doit être une chaîne de caractères.',

            'prixParNuit.required' => 'Le prix par nuit est obligatoire.',
            'prixParNuit.numeric' => 'Le prix par nuit doit être un nombre.',
            'prixParNuit.min' => 'Le prix par nuit doit être supérieur ou égal à 0.',

            'devise.required' => 'La devise est obligatoire.',
            'devise.in' => 'La devise doit être CFA, EUR, USD, GBP, CAD ou AUD.',

            'stock.required' => 'Le stock est obligatoire.',
            'stock.integer' => 'Le stock doit être un nombre entier.',
            'stock.min' => 'Le stock doit être au moins 1.',

            'capaciteMax.required' => 'La capacité maximale est obligatoire.',
            'capaciteMax.integer' => 'La capacité maximale doit être un nombre entier.',
            'capaciteMax.min' => 'La capacité maximale doit être au moins 1.',

            'nombreLits.required' => 'Le nombre de lits est obligatoire.',
            'nombreLits.integer' => 'Le nombre de lits doit être un nombre entier.',
            'nombreLits.min' => 'Le nombre de lits doit être au moins 1.',

            'nombreSallesDeBain.integer' => 'Le nombre de salles de bain doit être un nombre entier.',
            'nombreSallesDeBain.min' => 'Le nombre de salles de bain ne peut pas être négatif.',

            'surface.numeric' => 'La surface doit être un nombre.',
            'surface.min' => 'La surface ne peut pas être négative.',

            'statut.required' => 'Le statut est obligatoire.',
            'statut.in' => 'Le statut doit être disponible ou indisponible.',

            'idTypeChambre.required' => 'Le type de chambre est obligatoire.',
            'idTypeChambre.exists' => 'Le type de chambre sélectionné est invalide.',

            'idPolitiqueAnnulation.exists' => 'La politique d’annulation sélectionnée est invalide.',

            'ville.string' => 'La ville doit être une chaîne de caractères.',
            'ville.max' => 'La ville ne peut pas dépasser 255 caractères.',

            'pays.string' => 'Le pays doit être une chaîne de caractères.',
            'pays.max' => 'Le pays ne peut pas dépasser 255 caractères.',

            'adresse.string' => 'L’adresse doit être une chaîne de caractères.',
            'adresse.max' => 'L’adresse ne peut pas dépasser 255 caractères.',

            'equipements.array' => 'Les équipements doivent être envoyés sous forme de liste.',
            'equipements.*.exists' => 'Un ou plusieurs équipements sélectionnés sont invalides.',

            'images.*.image' => 'Chaque fichier doit être une image.',
            'images.*.mimes' => 'Chaque image doit être au format JPEG ou PNG.',
            'images.*.max' => 'Chaque image ne peut pas dépasser 10 Mo.',
        ]);

        // Création de la chambre
        $chambre = Chambre::create([
            'numero' => $validated['numero'],
            'description' => $validated['description'] ?? null,
            'prixParNuit' => $validated['prixParNuit'],
            'devise' => $validated['devise'],
            'stock' => $validated['stock'],
            'capaciteMax' => $validated['capaciteMax'],
            'nombreLits' => $validated['nombreLits'],
            'nombreSallesDeBain' => $validated['nombreSallesDeBain'] ?? 0,
            'surface' => $validated['surface'] ?? null,
            'statut' => $validated['statut'],
            'idPartenaire' => $partenaire->id,
            'idTypeChambre' => $validated['idTypeChambre'],
            'idPolitiqueAnnulation' => $validated['idPolitiqueAnnulation'] ?? null,
        ]);

        // Création localisation si fournie
        $localisationData = array_filter([
            'ville' => $request->ville,
            'pays' => $request->pays,
            'adresse' => $request->adresse,
        ]);
        if (!empty($localisationData)) {
            $localisation = Localisations::create($localisationData);
            $chambre->idLocalisation = $localisation->idLocalisation;
            $chambre->save();
        }

        // Ajout des équipements
        if (!empty($validated['equipements'])) {
            $chambre->equipements()->attach($validated['equipements']);
        }

        // Gestion des images
        if ($request->hasFile('images')) {
            $newImages = $request->file('images');
            if (count($newImages) > 10) {
                return back()->withErrors(['images' => 'Vous ne pouvez pas ajouter plus de 10 images.'])->withInput();
            }

            foreach ($newImages as $index => $image) {
                $path = $image->store('chambres', 'public');
                ImagesChambre::create([
                    'idChambre' => $chambre->id,
                    'url' => $path,
                    'estPrincipale' => $index === 0,
                ]);
            }
        } else {
            Log::info('Aucune image reçue dans la requête.', ['files' => $request->allFiles()]);
        }

        return redirect()->route('partenaire.chambre')->with('success', 'Chambre ajoutée avec succès.');
    }


    public function edit(Chambre $chambre)
    {
        // $this->authorize('update', $chambre); // facultatif

        $chambre = Chambre::with(['equipements', 'localisation'])->findOrFail($chambre->id);
        $equipements = Equipement::all();
        return view('partenaire.chambre-detail.edit', compact('chambre', 'equipements'));
    }



    public function update(Request $request, $id)
    {
        $chambre = Chambre::findOrFail($id);

        $validated = $request->validate([
            'titre' => [
                'required', 'string', 'max:150',
                Rule::unique('chambres')->ignore($id)
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
            'paiements' => 'nullable|array',
            'paiements.*' => 'string|max:50',
            'equipements' => 'nullable|array',
            'equipements.*' => 'exists:equipements,idEquipement',
            'images.*' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        $chambre->update([
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
        if ($chambre->localisation) {
            $chambre->localisation->update([
                'ville' => $request->ville,
                'pays' => $request->pays,
                'adresse' => $request->adresse,
            ]);
        }

        // Équipements
        $chambre->equipements()->sync($request->equipements ?? []);

        // Images supplémentaires
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('chambres', 'public');
                ImagesChambre::create([
                    'idChambre' => $chambre->id,
                    'url' => $path,
                    'estPrincipale' => false,
                ]);
            }
        }

        return redirect()->route('partenaire.chambre')->with('success', 'Chambre mise à jour avec succès.');
    }


    public function destroy($id)
    {
        $chambre = Chambre::with('images')->findOrFail($id);

        // Supprimer les images du stockage
        foreach ($chambre->images as $image) {
            if (Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }
            $image->delete();
        }

        // Supprimer les relations (si contraintes manuelles)
        $chambre->equipements()->detach();
        $chambre->dates()->delete();

        $chambre->delete();

        return redirect()->route('partenaire.chambre')->with('success', 'Chambre supprimée avec succès.');
    }



}
