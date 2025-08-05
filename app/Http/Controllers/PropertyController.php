<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    // ← NOUVELLE MÉTHODE RÉUTILISABLE
    public function buildItems(Request $request, int $perPage = 8): LengthAwarePaginator
    {
        $search    = trim((string) $request->input('search', ''));
        $categorie = (string) $request->input('categorie', ''); // '', hebergement, vol, excursion, evenement
        $prixMin   = $request->filled('prix_min') ? (int) $request->input('prix_min') : null;
        $prixMax   = $request->filled('prix_max') ? (int) $request->input('prix_max') : null;

        $cards = collect();

        // --- Hébergements ---
        if ($categorie === '' || $categorie === 'hebergement') {
            $rows = DB::table('hebergements')
                ->select('id', 'nom', 'prixParNuit as prix', 'devise', 'nombreChambres', 'nombreSallesDeBain', 'capaciteMax', 'noteMoyenne', 'idPartenaire', 'stock')
                ->where('statut', 'actif') // uniquement actifs
                ->when($search !== '', fn($q) => $q->where('nom', 'like', "%{$search}%"))
                ->when(!is_null($prixMin), fn($q) => $q->where('prixParNuit', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prixParNuit', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                return [
                    'id'           => $r->id,
                    'img'          => $this->coverFor('hebergement', $r->id),
                    'beds'         => ($r->nombreChambres ?? 0) . ' chambres',
                    'baths'        => ($r->nombreSallesDeBain ?? 0) . ' salles de bain',
                    'capaciteMax'  => $r->capaciteMax,
                    'noteMoyenne'  => $r->noteMoyenne !== null ? round($r->noteMoyenne, 1) : null,
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'title'        => $r->nom,
                    'categorie'    => 'hebergement',
                    'idPartenaire' => $r->idPartenaire,
                    'stock'        => $r->stock ?? null,
                ];
            }));
        }

        // --- Vols ---
        if ($categorie === '' || $categorie === 'vol') {
            $rows = DB::table('vols')
                ->select('id', 'compagnie', 'numeroVol', 'villeDepart', 'villeArrivee', 'prix', 'devise', 'dateDepart', 'dateArrivee', 'idPartenaire', 'placesDisponibles')
                ->where('statut', 'actif') // uniquement actifs
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
                    'id'               => $r->id,
                    'img'              => $this->coverFor('vol', $r->id),
                    'price'            => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'        => (int) $r->prix,
                    'title'            => "Vol {$r->villeDepart} → {$r->villeArrivee}",
                    'categorie'        => 'vol',
                    'compagnie'        => $r->compagnie,
                    'numeroVol'        => $r->numeroVol,
                    'depart'           => $r->villeDepart,
                    'arrivee'          => $r->villeArrivee,
                    'dateDepart'       => $r->dateDepart,
                    'dateArrivee'      => $r->dateArrivee,
                    'idPartenaire'     => $r->idPartenaire,
                    'placesDisponibles' => $r->placesDisponibles ?? null,
                ];
            }));
        }

        // --- Excursions ---
        if ($categorie === '' || $categorie === 'excursion') {
            $rows = DB::table('excursions')
                ->select('id', 'titre', 'prix', 'devise', 'duree', 'capacite_max', 'itineraire', 'age_minimum', 'partenaire_id', 'stock')
                ->where('statut', 'actif') // uniquement actifs
                ->when($search !== '', fn($q) => $q->where('titre', 'like', "%{$search}%"))
                ->when(!is_null($prixMin), fn($q) => $q->where('prix', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prix', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                return [
                    'id'           => $r->id,
                    'img'          => $this->coverFor('excursion', $r->id),
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'title'        => $r->titre,
                    'categorie'    => 'excursion',
                    'duree'        => is_numeric($r->duree) ? (int)$r->duree : null,
                    'capaciteMax'  => $r->capacite_max,
                    'itineraire'   => $r->itineraire,
                    'ageMinimum'   => $r->age_minimum,
                    'idPartenaire' => $r->partenaire_id,
                    'stock'        => $r->stock ?? null,
                ];
            }));
        }

        // --- Événements ---
        if ($categorie === '' || $categorie === 'evenement') {
            $rows = DB::table('evenements')
                ->select('id', 'titre', 'prix', 'devise', 'duree', 'capacite_max', 'statut', 'description', 'idPartenaire', 'stock')
                ->where('statut', 'actif') // uniquement actifs
                ->when($search !== '', fn($q) => $q->where('titre', 'like', "%{$search}%"))
                ->when(!is_null($prixMin), fn($q) => $q->where('prix', '>=', $prixMin))
                ->when(!is_null($prixMax), fn($q) => $q->where('prix', '<=', $prixMax))
                ->get();

            $cards = $cards->merge($rows->map(function ($r) {
                return [
                    'id'           => $r->id,
                    'img'          => $this->coverFor('evenement', $r->id),
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'title'        => $r->titre,
                    'categorie'    => 'evenement',
                    'duree'        => is_numeric($r->duree) ? (int)$r->duree : null,
                    'capaciteMax'  => $r->capacite_max,
                    'statut'       => $r->statut,
                    'description'  => $r->description,
                    'idPartenaire' => $r->idPartenaire,
                    'stock'        => $r->stock ?? null,
                ];
            }));
        }

        // Pagination « maison » sur la collection
        $page  = LengthAwarePaginator::resolveCurrentPage();
        $total = $cards->count();
        $slice = $cards->forPage($page, $perPage)->values();

        // IMPORTANT : fixe le path (utile si tu réutilises sur /)
        $paginator = new LengthAwarePaginator($slice, $total, $perPage, $page, [
            'path'  => $request->url(),
            'query' => $request->query(),
        ]);

        return $paginator;
    }

    // Reste identique : la page /offres
    public function index(Request $request)
    {
        $items = $this->buildItems($request, perPage: 8);
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
            'hebergement' => 'https://cdn.pixabay.com/photo/2017/01/14/12/48/hotel-1979406_1280.jpg',
            'vol'         => 'https://cdn.pixabay.com/photo/2020/02/27/20/48/aircraft-4885805_1280.jpg',
            'excursion'   => 'https://cdn.pixabay.com/photo/2020/04/17/07/20/travel-5053561_1280.jpg',
            'evenement'   => 'https://cdn.pixabay.com/photo/2016/11/22/19/15/hand-1850120_1280.jpg',
            default       => 'https://via.placeholder.com/1200x675?text=Image',
        };
    }

    // (Optionnel) page détail si tu en as besoin
    public function show(string $categorie, int $id)
    {
        switch ($categorie) {
            case 'hebergement':
                $r = DB::table('hebergements')->where('id', $id)->first();
                if (!$r) abort(404);

                $pid  = $this->getPartenaireId($r);   // lit idPartenaire
                $meta = $this->getPartenaireMeta($pid);

                $item = array_merge([
                    'id'           => $r->id,
                    'categorie'    => 'hebergement',
                    'title'        => $r->nom,
                    'price'        => $this->fmtPrice($r->prixParNuit, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prixParNuit,
                    'img'          => $this->coverFor('hebergement', $r->id),
                    'images'       => [$this->coverFor('hebergement', $r->id)],
                    'nombreChambres'      => $r->nombreChambres,
                    'nombreSallesDeBain'  => $r->nombreSallesDeBain,
                    'capaciteMax'         => $r->capaciteMax,
                    'noteMoyenne'         => $r->noteMoyenne !== null ? round($r->noteMoyenne, 1) : null,
                    'description'         => $r->description ?? null,
                    'heureArrivee'        => $r->heureArrivee ?? null,
                    'heureDepart'         => $r->heureDepart ?? null,
                    'numeroDeTel'         => $r->numeroDeTel ?? null,
                    'statut'              => $r->statut ?? null,
                    'stock'               => $r->stock ?? null,
                ], $meta);

                break;


            case 'vol':
                $r = DB::table('vols')->where('id', $id)->first();
                if (!$r) abort(404);

                $pid  = $this->getPartenaireId($r);   // lit idPartenaire
                $meta = $this->getPartenaireMeta($pid);

                $item = array_merge([
                    'id'           => $r->id,
                    'categorie'    => 'vol',
                    'title'        => "Vol {$r->villeDepart} → {$r->villeArrivee}",
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'img'          => $this->coverFor('vol', $r->id),
                    'images'       => [$this->coverFor('vol', $r->id)],
                    'compagnie'    => $r->compagnie,
                    'numeroVol'    => $r->numeroVol,
                    'depart'       => $r->villeDepart,
                    'arrivee'      => $r->villeArrivee,
                    'dateDepart'   => $r->dateDepart,
                    'dateArrivee'  => $r->dateArrivee,
                    'statut'       => $r->statut ?? null,
                    'description'  => null,
                    'placesDisponibles' => $r->placesDisponibles ?? null,
                ], $meta);

                break;


            case 'excursion':
                $r = DB::table('excursions')->where('id', $id)->first();
                if (!$r) abort(404);

                $pid  = $this->getPartenaireId($r);   // lit partenaire_id
                $meta = $this->getPartenaireMeta($pid);

                $dureeInt = is_numeric($r->duree) ? (int) $r->duree : null;
                $item = array_merge([
                    'id'           => $r->id,
                    'categorie'    => 'excursion',
                    'title'        => $r->titre,
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'img'          => $this->coverFor('excursion', $r->id),
                    'images'       => [$this->coverFor('excursion', $r->id)],
                    'duree'        => $dureeInt,
                    'capaciteMax'  => $r->capacite_max ?? null,
                    'itineraire'   => $r->itineraire ?? null,
                    'ageMinimum'   => $r->age_minimum ?? null,
                    'statut'       => $r->statut ?? null,
                    'description'  => $r->description ?? null,
                    'stock'        => $r->stock ?? null,
                ], $meta);
                break;


            case 'evenement':
                $r = DB::table('evenements')->where('id', $id)->first();
                if (!$r) abort(404);

                $pid  = $this->getPartenaireId($r);   // lit idPartenaire
                $meta = $this->getPartenaireMeta($pid);

                $dureeInt = is_numeric($r->duree) ? (int) $r->duree : null;
                $item = array_merge([
                    'id'           => $r->id,
                    'categorie'    => 'evenement',
                    'title'        => $r->titre,
                    'price'        => $this->fmtPrice($r->prix, $r->devise ?? 'FCFA'),
                    'price_num'    => (int) $r->prix,
                    'img'          => $this->coverFor('evenement', $r->id),
                    'images'       => [$this->coverFor('evenement', $r->id)],
                    'duree'        => $dureeInt,
                    'capaciteMax'  => $r->capacite_max ?? null,
                    'statut'       => $r->statut ?? null,
                    'description'  => $r->description ?? null,
                    'stock'        => $r->stock ?? null,
                ], $meta);
                break;
            default:
                abort(404);
        }

        return view('client.property-detail-two', compact('item'));
    }

    private function getPartenaireId(object $row): ?int
    {
        // les tables n'ont pas toutes le même nom de FK
        foreach (['idPartenaire', 'partenaire_id'] as $col) {
            if (isset($row->$col) && $row->$col !== null) {
                return (int) $row->$col;
            }
        }
        return null;
    }

    private function getPartenaireMeta(?int $id): array
    {
        if (!$id) {
            return [
                'idPartenaire'   => null,
                'partenaireNom'  => null,
                'partenaireTel'  => null,
                'partenaireMail' => null,
                'partenaireSite' => null,
            ];
        }

        $p = DB::table('partenaires')
            ->select('nom_entreprise', 'téléphone', 'email', 'siteWeb')
            ->where('id', $id)
            ->first();
        return [
            'idPartenaire'   => $id,
            'partenaireNom'  => $p->nom_entreprise ?? null,
            'partenaireTel'  => $p->téléphone     ?? null, // colonne avec accent
            'partenaireMail' => $p->email         ?? null,
            'partenaireSite' => $p->siteWeb       ?? null,
        ];
    }
}
