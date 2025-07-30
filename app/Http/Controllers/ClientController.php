<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use App\Models\Excursion;
use App\Models\Hebergement;
use App\Models\Localisations;
use App\Models\Vol;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PropertyController $properties)
    {
        // Récupère les offres à afficher sur l'accueil (ex: 8 items)
        $items = $properties->buildItems($request, perPage: 8);

        // Prépare la liste des catégories dynamiques
        $categories = [
    [
        'slug'  => 'hebergement',
        'label' => 'Hébergements',
        'icon'  => 'uil uil-home',
        'image' => asset('https://img.freepik.com/photos-gratuite/belle-villa-luxe-jardin_1150-12614.jpg'), // exemple chemin image
        'count' => DB::table('hebergements')->count(),
    ],
    [
        'slug'  => 'vol',
        'label' => 'Vols',
        'icon'  => 'uil uil-plane',
        'image' => asset('https://img.freepik.com/photos-gratuite/avion-vol-coucher-soleil_1112-1311.jpg'),
        'count' => DB::table('vols')->count(),
    ],
    [
        'slug'  => 'excursion',
        'label' => 'Excursions',
        'icon'  => 'uil uil-map',
        'image' => asset('https://img.freepik.com/photos-gratuite/paysage-tropical-soleil-plage_1150-11064.jpg'),
        'count' => DB::table('excursions')->count(),
    ],
    [
        'slug'  => 'evenement',
        'label' => 'Événements',
        'icon'  => 'uil uil-calender',
        'image' => asset('https://img.freepik.com/photos-gratuite/foule-concert-lumiere-scene_1150-17717.jpg'),
        'count' => DB::table('evenements')->count(),
    ],
];


        return view('client.index', compact('items', 'categories'));
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


    public function login()
    {
        return view('client.auth.login');
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
