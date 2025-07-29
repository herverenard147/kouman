<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // Filtres
        $search    = trim((string) $request->input('search', ''));
        $categorie = (string) $request->input('categorie', ''); // '', hebergement, vol, excursion, evenement
        $prixMin   = $request->filled('prix_min') ? (int) $request->input('prix_min') : null;
        $prixMax   = $request->filled('prix_max') ? (int) $request->input('prix_max') : null;

        $cards = collect();

        // --- Hébergements ---
        if ($categorie === '' || $categorie === 'hebergement') {
            $rows = DB::table('hebergements')
                ->select(
                    'id',
                    'nom',
                    'prixParNuit as prix',
                    'devise',
                    'nombreChambres',
                    'nombreSallesDeBain',
                    'noteMoyenne',
                    'capaciteMax' // ajout
                )
                ->when($search !== '', fn($q) => $q->where('nom', 'like', "%{$search}%"))
                ->when(!is_null($prixMin), fn($q) => $q->where('prixParNuit', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prixParNuit', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                return [
                    'id'          => $r->id,
                    'img'         => $this->coverFor('hebergement', $r->id),
                    'beds'        => ($r->nombreChambres ?? 0) . ' chambres',
                    'baths'       => ($r->nombreSallesDeBain ?? 0) . ' salles de bain',
                    'capaciteMax' => $r->capaciteMax ?? null,          // ← utilisé en vue (pers.)
                    'noteMoyenne' => $r->noteMoyenne !== null ? round($r->noteMoyenne, 1) : null,
                    'price'       => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'   => (int) $r->prix,
                    'title'       => $r->nom,
                    'categorie'   => 'hebergement',
                ];
            }));
        }

        // --- Vols ---
        if ($categorie === '' || $categorie === 'vol') {
            $rows = DB::table('vols')
                ->select(
                    'id',
                    'compagnie',
                    'numeroVol',
                    'villeDepart',
                    'villeArrivee',
                    'dateDepart',
                    'dateArrivee', // ← ajout
                    'prix',
                    'devise'
                )
                ->when($search !== '', function ($q) use ($search) {
                    $q->where(function ($w) use ($search) {
                        $w->where('compagnie', 'like', "%{$search}%")
                            ->orWhere('numeroVol', 'like', "%{$search}%")
                            ->orWhere('villeDepart', 'like', "%{$search}%")
                            ->orWhere('villeArrivee', 'like', "%{$search}%");
                    });
                })
                ->when(!is_null($prixMin), fn($q) => $q->where('prix', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prix', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                return [
                    'id'          => $r->id,
                    'img'         => $this->coverFor('vol', $r->id),
                    'compagnie'   => $r->compagnie,                    // ← utilisé en vue
                    'numeroVol'   => $r->numeroVol,                    // ← utilisé en vue
                    'depart'      => $r->villeDepart,                  // ← utilisé en vue
                    'arrivee'     => $r->villeArrivee,                 // ← utilisé en vue
                    'dateDepart'  => $r->dateDepart,                   // ← utilisé en vue (affichage brut)
                    'dateArrivee' => $r->dateArrivee,                  // ← idem
                    'price'       => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'   => (int) $r->prix,
                    'title'       => "Vol {$r->villeDepart} → {$r->villeArrivee}",
                    'categorie'   => 'vol',
                ];
            }));
        }

        // --- Excursions ---
        if ($categorie === '' || $categorie === 'excursion') {
            // --- Excursions ---
            if ($categorie === '' || $categorie === 'excursion') {
                $rows = DB::table('excursions')
                    ->select(
                        'id',
                        'titre',
                        'prix',
                        'devise',
                        'duree',
                        'capacite_max as capaciteMax',
                        'itineraire',                 // <-- ajouté
                        'age_minimum as ageMinimum'   // <-- ajouté
                    )
                    ->when($search !== '', fn($q) => $q->where('titre', 'like', "%{$search}%"))
                    ->when(!is_null($prixMin), fn($q) => $q->where('prix', '>=', $prixMin))
                    ->when(!is_null($prixMax), fn($q) => $q->where('prix', '<=', $prixMax))
                    ->get();

                $cards = $cards->merge($rows->map(function ($r) {
                    // durée en entier si numérique
                    $dureeInt = is_numeric($r->duree) ? (int) $r->duree : null;

                    return [
                        'id'          => $r->id,
                        'img'         => $this->coverFor('excursion', $r->id),
                        'duree'       => $dureeInt,                         // entier pour l’affichage "h"
                        'capaciteMax' => $r->capaciteMax ?? null,
                        'itineraire'  => $r->itineraire ?? null,            // pour la vue
                        'ageMinimum'  => $r->ageMinimum ?? null,            // pour la vue
                        'price'       => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                        'price_num'   => (int) $r->prix,
                        // on évite de coller la durée brute au titre; on la rend dans la card
                        'title'       => $r->titre,
                        'categorie'   => 'excursion',
                    ];
                }));
            }
        }

        // --- Événements ---
        if ($categorie === '' || $categorie === 'evenement') {
            $rows = DB::table('evenements') // ou 'evenements' si ta table s'appelle ainsi
                ->select(
                    'id',
                    'titre',
                    'prix',
                    'devise',
                    'duree',
                    'capacite_max as capaciteMax', // ← utile
                    'statut'                        // ← utile
                )
                ->when($search !== '', fn($q) => $q->where('titre', 'like', "%{$search}%"))
                ->when(!is_null($prixMin), fn($q) => $q->where('prix', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prix', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                // durée en entier si numérique
                    $dureeInt = is_numeric($r->duree) ? (int) $r->duree : null;
                return [
                    'id'          => $r->id,
                    'img'         => $this->coverFor('evenement', $r->id),
                    'duree'       => $dureeInt,                        // ← utilisé en vue
                    'capaciteMax' => $r->capaciteMax ?? null,          // ← utilisé en vue (pers.)
                    'statut'      => $r->statut ?? null,               // ← utilisé en vue
                    'price'       => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'   => (int) $r->prix,
                    'title'       => $r->titre . ($r->duree ? " – {$r->duree}" : ''),
                    'categorie'   => 'evenement',
                ];
            }));
        }


        // Pagination de la collection
        $page    = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $total   = $cards->count();
        $slice   = $cards->forPage($page, $perPage)->values();
        $items   = new LengthAwarePaginator($slice, $total, $perPage, $page, [
            'path'  => $request->url(),
            'query' => $request->query(),
        ]);

        return view('client.grid-sidebar', compact('items'));
    }

    // ------ Helpers d'affichage ------

    /** Formate un prix entier en "FCFA 185 000" */
    private function fmtPrice($amount, $devise = 'FCFA'): string
    {
        $n = (int) $amount;
        return trim($devise . ' ' . number_format($n, 0, ',', ' '));
    }

    /** À adapter pour tes colonnes d'images réelles */
    private function coverFor(string $categorie, int $id): string
    {
        return match ($categorie) {
            'hebergement' => 'https://img.freepik.com/photos-gratuite/belle-villa-luxe-jardin_1150-12614.jpg',
            'vol'         => 'https://img.freepik.com/photos-gratuite/avion-vol-coucher-soleil_1112-1311.jpg',
            'excursion'   => 'https://img.freepik.com/photos-gratuite/paysage-tropical-soleil-plage_1150-11064.jpg',
            'evenement'   => 'https://img.freepik.com/photos-gratuite/foule-concert-lumiere-scene_1150-17717.jpg',
            default       => 'https://via.placeholder.com/1200x675?text=Image',
        };
    }

    // (Optionnel) page détail si tu en as besoin
    public function show(int $id)
    {
        // Exemple simple : on cherche l'ID dans chaque table (collisions possibles si mêmes IDs)
        $item = DB::table('hebergements')->where('id', $id)->first();
        if ($item) {
            // retourne une vue détail hébergement
            return view('client.property.detail', compact('item'));
        }
        $item = DB::table('vols')->where('id', $id)->first();
        if ($item) {
            return view('client.property.detail_vol', compact('item'));
        }
        $item = DB::table('excursions')->where('id', $id)->first();
        if ($item) {
            return view('client.property.detail_excursion', compact('item'));
        }
        $item = DB::table('evenement')->where('id', $id)->first();
        if ($item) {
            return view('client.property.detail_evenement', compact('item'));
        }

        abort(404);
    }
}
