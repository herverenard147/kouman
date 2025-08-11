<?php

namespace App\Http\Controllers\Hebergement;

use App\Models\Equipement;
use App\Models\Hebergement;
use Illuminate\Http\Request;
use App\Models\Localisations;
use App\Models\PrixHebergement;
use Illuminate\Validation\Rule;
use App\Models\ImagesHebergement;
use Illuminate\Support\Facades\Auth;
use App\Models\PolitiquesAnnulation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHebergementRequest;
use App\Http\Requests\UpdateHebergementRequest;
use App\Models\FamilleTypeHebergements;
use Illuminate\Support\Facades\Storage;

class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hebergements = Hebergement::where('idPartenaire', Auth::guard('partenaire')->id())
        ->with('imagePrincipale', 'images', 'type', 'localisation', 'avis') // ajoute les relations nécessaires
        ->paginate(6); // nombre d'éléments par page
        // dd($hebergements);
        return view('screens.add.Hebergement.hebergement', compact('hebergements'));
        // return response()->file(resource_path('views/screens/add/Hebergement/hebergement.blade.php'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familles = FamilleTypeHebergements::with('types')->get();
        $equipements = Equipement::all();
        $politiques = PolitiquesAnnulation::all();
        // dd($familles, $equipements, $politiques);
        return view('screens.add.Hebergement.hebergement-add', compact('familles', 'equipements', 'politiques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHebergementRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        // Créer la localisation
        $localisation = Localisations::create([
            'ville' => $request->ville,
            'pays' => $request->pays,
            'codePostal' => $request->codePostal,
            'adresse' => $request->adresse,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);


        // dd($localisation);

        // Créer l'hébergement
        $hebergement = Hebergement::create([
            'nom' => $request->nom,
            'idType' => $request->idType,
            'description' => $request->description,
            'prixParNuit' => $request->prixParNuit,
            'devise' => $request->devise,
            'idLocalisation' => $localisation->id,
            'idPartenaire' => Auth::guard('partenaire')->id(), // Assumes partenaire is linked to user
            'nombreChambres' => $request->nombreChambres,
            'capaciteMax' => $request->capaciteMax,
            'idPolitiqueAnnulation' => $request->idPolitiqueAnnulation,
            'heureArrivee' => $request->heureArrivee,
            'heureDepart' => $request->heureDepart,
            'stock' => $request->stock,
        ]);
        // dd($hebergement->toArray());
        foreach ($request->input('telephones', []) as $telData) {
            $hebergement->telephones()->create([
                'numero' => $telData['numero']
            ]);
        }
        // Associer les équipements
        if ($request->equipements) {
            $hebergement->equipements()->sync($request->equipements);
        }

        // Sauvegarder les images
        if ($request->hasFile('images')) {
            $newImages = $request->file('images');
            if (count($newImages) > 10) {
                return back()->withErrors(['images' => 'Vous ne pouvez pas ajouter plus de 10 images.']);
            }

            foreach ($newImages as $index => $image) {
                $path = $image->store('hebergements', 'public');
                $images = ImagesHebergement::create([
                    'idHebergement' => $hebergement->id,
                    'url' => $path,
                    'estPrincipale' => $index === 0, // Première image principale
                ]);
            }
        }
            // Sauvegarder les prix saisonniers
        if ($request->prixSaisonniers) {
            foreach ($request->prixSaisonniers as $prix) {
                if ($prix['dateDebut'] && $prix['dateFin'] && $prix['prixParNuit']) {
                    PrixHebergement::create([
                        'idHebergement' => $hebergement->id,
                        'dateDebut' => $prix['dateDebut'],
                        'dateFin' => $prix['dateFin'],
                        'prixParNuit' => $prix['prixParNuit'],
                        'devise' => $request->devise,
                    ]);
                }
            }
                // dd($request->prixSaisonniers);
        }

        return redirect()->route('partenaire.add.hebergement')->with('success', 'Hébergement ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $partenaireId = Auth::guard('partenaire')->id();
            $hebergement = Hebergement::with([
                'imagePrincipale',
                'images',
                'localisation',
                'type',
                'avis',
                'equipements',
                'prixSaisonniers'
            ])
            ->where('idPartenaire', $partenaireId)
            ->findOrFail($id);

            return view('screens.add.Hebergement.hebergement-detail', compact('hebergement'));
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getTraceAsString());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        $hebergement = Hebergement::with([
            'imagePrincipale', // Correction : remplacé 'estPrincipale' par 'imagePrincipale'
            'images',
            'localisation',
            'type',
            'avis',
            'equipements',
            'type',
            'prixSaisonniers',
            'politiqueAnnulation'
        ])
        ->where('idPartenaire', Auth::guard('partenaire')->id()) // Correction : 'id' → 'idPartenaire'
        ->findOrFail($id);
        // dd($hebergement);
        $familles = FamilleTypeHebergements::with('types')->get();
        $equipements = Equipement::all();
        $politiques = PolitiquesAnnulation::all();
        // dd($hebergement, $familles, $equipements, $politiques);
        return view('screens.add.Hebergement.hebergement-update', compact('hebergement', 'familles', 'equipements', 'politiques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHebergementRequest $request, string $id)
    {
        $partenaire = Auth::guard('partenaire')->user();
        $hebergement = Hebergement::where('id', $id)
                    ->where('idPartenaire', $partenaire->id)
                    ->firstOrFail();

        // Validation des données
        $validated = $request->validated();

        $localisationData = array_filter([
            'ville' => $request->ville,
            'pays' => $request->pays,
            'adresse' => $request->adresse,
            'codePostal' => $request->codePostal,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        if ($hebergement->localisation) {
            $hebergement->localisation->update($localisationData);
        } else if (!empty($localisationData)) {
            $localisation = Localisations::create($localisationData);
            $hebergement->idLocalisation = $localisation->idLocalisation;
        }

        // Mettre à jour l'hébergement
        $hebergement->update([
            'nom' => $validated['nom'],
            'idType' => $validated['idType'],
            'description' => $validated['description'],
            'prixParNuit' => $validated['prixParNuit'],
            'devise' => $validated['devise'],
            'idPolitiqueAnnulation' => $validated['idPolitiqueAnnulation'],
            'nombreChambres' => $validated['nombreChambres'],
            'nombreSallesDeBain' => $validated['nombreSallesDeBain'],
            'capaciteMax' => $validated['capaciteMax'],
            'heureArrivee' => $validated['heureArrivee'],
            'heureDepart' => $validated['heureDepart'],
            'idLocalisation' => $hebergement->idLocalisation,
        ]);

        $hebergement->telephones()->delete();
        foreach ($request->input('telephones', []) as $telData) {
            $hebergement->telephones()->create([
                'numero' => $telData['numero']
            ]);
        }

        // 1. Supprimer les images marquées
        if ($request->has('images_to_keep')) {
            // Récupérer le tableau des images à conserver, ou tableau vide si rien envoyé
            $imagesToKeep = $request->images_to_keep;

            foreach ($hebergement->images as $image) {
                // Supprimer seulement si l'image est explicitement marquée pour suppression (0)
                if (array_key_exists($image->id, $imagesToKeep) && $imagesToKeep[$image->id] == 0) {
                    Storage::delete($image->url);
                    $image->delete();
                }
            }
        }


        // Gérer les nouvelles images
        if ($request->hasFile('images')) {
            $currentImageCount = $hebergement->images()->count();
            $newImages = $request->file('images');
            if ($currentImageCount + count($newImages) > 10) {
                return back()->withErrors(['images' => 'Vous ne pouvez pas avoir plus de 10 images au total.']);
            }

            foreach ($newImages as $index => $image) {
                $path = $image->store('hebergements', 'public');
                ImagesHebergement::create([
                    'idHebergement' => $hebergement->id,
                    'url' => $path,
                    'estPrincipale' => $index === 0 && !$hebergement->imagePrincipale,
                ]);
            }
        }

        // Synchroniser les équipements
        $hebergement->equipements()->sync($request->equipements ?? []);

        // Gérer les prix saisonniers
        $hebergement->prixSaisonniers()->delete();
        if ($request->filled('prixSaisonniers')) {
            foreach ($request->prixSaisonniers as $saisonnier) {
                if ($saisonnier['dateDebut'] && $saisonnier['dateFin'] && $saisonnier['prixParNuit']) {
                    PrixHebergement::create([
                        'idHebergement' => $hebergement->id,
                        'dateDebut' => $saisonnier['dateDebut'],
                        'dateFin' => $saisonnier['dateFin'],
                        'prixParNuit' => $saisonnier['prixParNuit'],
                    ]);
                }
            }
        }
        // dd($hebergement->toArray(), $request->all());
        return redirect()->route('partenaire.hebergement-detail.show', $hebergement->id)
            ->with('success', 'Hébergement mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partenaire = Auth::guard('partenaire')->user();
        $hebergement = Hebergement::where('id', $id)
                    ->where('idPartenaire', $partenaire->id)
                    ->firstOrFail();


        // Supprimer les images associées
        foreach ($hebergement->images as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        // Supprimer les relations (equipements, prix saisonniers, avis) automatiquement via cascade
        $hebergement->delete();

        // Supprimer la localisation si elle existe
        if ($hebergement->localisation) {
            $hebergement->localisation->delete();
        }

        return redirect()->route('partenaire.hebergement')
            ->with('success', 'Hébergement supprimé avec succès.');
    }
}