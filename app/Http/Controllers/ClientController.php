<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use App\Models\Excursion;
use App\Models\Hebergement;
use App\Models\Localisations;
use App\Models\Vol;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer les données
        $hebergements = Hebergement::all()->map(function ($item) {
            $item->type = 'hebergement';
            return $item;
        });

        $vols = Vol::all()->map(function ($item) {
            $item->type = 'vol';
            return $item;
        });

        $excursions = Excursion::all()->map(function ($item) {
            $item->type = 'excursion';
            return $item;
        });

        $evenements = Evenement::all()->map(function ($item) {
            $item->type = 'evenement';
            return $item;
        });
        
        $localisations = Localisations::all()->map(function ($item) {
            $item->type = 'localisation';
            return $item;
        });

        // Fusionner les collections
        $items = $hebergements
            ->concat($vols)
            ->concat($excursions)
            ->concat($evenements);

        // Trier (optionnel) par date ou autre, par exemple ici par 'created_at' décroissant
        $items = $items->sortByDesc('created_at');
        // dd($evenements, $vols, $excursions, $hebergements);
        return view('client.index', compact('items', 'localisations')); // Adjust the view as needed
    }

    
    public function filtrer(Request $request)
    {
        $query = $request->input('search');
        $categorie = $request->input('categorie');
        $ville = $request->input('ville');
        $prixMin = $request->input('prix_min');
        $prixMax = $request->input('prix_max');

        $hebergements = Hebergement::query()
            ->when($query, fn($q) => $q->where('nom', 'like', "%$query%"))
            ->when($categorie === 'hebergement', fn($q) => $q)
            ->when($ville, fn($q) => $q->where('ville', 'like', "%$ville%"))
            ->when($prixMin, fn($q) => $q->where('prix_nuit', '>=', $prixMin))
            ->when($prixMax, fn($q) => $q->where('prix_nuit', '<=', $prixMax))
            ->get();

        $vols = Vol::query()
            ->when($query, fn($q) => $q->where('compagnie', 'like', "%$query%"))
            ->when($categorie === 'vol', fn($q) => $q)
            ->when($ville, fn($q) => $q->where('villeDepart', 'like', "%$ville%")->orWhere('villeArrivee', 'like', "%$ville%"))
            ->when($prixMin, fn($q) => $q->where('prix', '>=', $prixMin))
            ->when($prixMax, fn($q) => $q->where('prix', '<=', $prixMax))
            ->get();

        $excursions = Excursion::query()
            ->when($query, fn($q) => $q->where('nom', 'like', "%$query%"))
            ->when($categorie === 'excursion', fn($q) => $q)
            ->when($ville, fn($q) => $q->where('ville_depart', 'like', "%$ville%"))
            ->when($prixMin, fn($q) => $q->where('prix', '>=', $prixMin))
            ->when($prixMax, fn($q) => $q->where('prix', '<=', $prixMax))
            ->get();

        $evenements = Evenement::query()
            ->when($query, fn($q) => $q->where('titre', 'like', "%$query%"))
            ->when($categorie === 'evenement', fn($q) => $q)
            ->when($ville, fn($q) => $q->where('lieu', 'like', "%$ville%"))
            ->when($prixMin, fn($q) => $q->where('prix', '>=', $prixMin))
            ->when($prixMax, fn($q) => $q->where('prix', '<=', $prixMax))
            ->get();

        return view('client.resultats', compact('hebergements', 'vols', 'excursions', 'evenements'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
