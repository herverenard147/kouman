<?php

// app/Http/Controllers/PartenaireController.php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Evenement;
use App\Models\Excursion;
use App\Models\Hebergement;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartenaireController extends Controller
{
    // ... tes méthodes existantes (index, show, etc.)
    public function index()
    {
        $partenaireId = Auth::guard('partenaire')->id();

        $nombreH = Hebergement::where('idPartenaire', $partenaireId)->count();
        $nombreE = Evenement::where('idPartenaire', $partenaireId)->count();
        $nombreEx = Excursion::where('partenaire_id', $partenaireId)->count();
        $nombreV = Vol::where('idPartenaire', $partenaireId)->count();

        $user = Auth::guard('partenaire')->user();
        // dd($nombreE,$nombreEx, $nombreH, $nombreV);
        $properties = [
            [
                'icon' => 'mdi mdi-account-group-outline text-[28px]',
                'title' => "Nombre d'hébergements",
                'total' => $nombreH,
                'debut' => 0, // tu peux ajuster selon objectif
                'symbol' => '',
            ],
            [
                'icon' => 'mdi mdi-calendar-month-outline text-[28px]',
                'title' => "Nombre d'événements",
                'total' => $nombreE,
                'debut' => 0,
                'symbol' => '',
            ],
            [
                'icon' => 'mdi mdi-map-marker-radius-outline text-[28px]',
                'title' => "Nombre d'excursions",
                'total' => $nombreEx,
                'debut' => 0,
                'symbol' => '',
            ],
            [
                'icon' => 'mdi mdi-airplane text-[28px]',
                'title' => "Nombre de vols",
                'total' => $nombreV,
                'debut' => 0,
                'symbol' => '',
            ],
        ];

        return view('screens.index', compact('user', 'properties'));
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
    public function show(Partenaire $partenaire)
    {
        // On récupère l'ID de l'utilisateur connecté
        $id = Auth::guard('partenaire')->id();

        // On charge directement depuis la base avec les relations
        $partenaire = Partenaire::with(['hebergements', 'excursions', 'evenements', 'vols'])->findOrFail($id);

        return view('screens.profile', compact('partenaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }

    /**
     * Liste publique des partenaires (alimente $agencies pour la vue).
     */
    public function publicIndex(Request $request)
    {
        $partenaires = Partenaire::orderBy('nom_entreprise')
            ->get(['id', 'nom_entreprise', 'type', 'siteWeb']);

        // On mappe vers le même schéma que l'include attend: img / name / title
        $agencies = $partenaires->map(function (Partenaire $p) {
            // Image par défaut (compatible avec asset('client/assets' . $item['img']))
            $relativeLogo = '/images/agency/1.png';

            // Si tu déposes des logos réels dans public/client/assets/partners/{id}.png,
            // ils seront pris automatiquement :
            $candidate = public_path("client/assets/partners/{$p->id}.png");
            if (file_exists($candidate)) {
                $relativeLogo = "/partners/{$p->id}.png";
            }

            return [
                'img'   => $relativeLogo,
                'name'  => $p->nom_entreprise,
                'title' => $p->type ?: 'Partenaire',
            ];
        });

        return view('client.agencies', compact('agencies'));
    }
}
