<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Evenement;
use App\Models\Excursion;
use App\Models\Hebergement;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartenaireController extends Controller
{
    public function profile()
    {
        $partenaire = auth('partenaire')->user();
        return view('partenaire.profile', compact('partenaire'));
    }

    public function editProfile()
    {
        $partenaire = auth('partenaire')->user();
        // dd($partenaire); // Debugging line to check the partenaire data
        return view('partenaire.edit-profile', compact('partenaire'));
    }

    public function updateProfile(Request $request)
    {
        $partenaire = auth('partenaire')->user();

        $data = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'email'         => 'required|email',
            'telephone'     => 'nullable',
            'adresse'       => 'nullable',
            'siteWeb'       => 'nullable|url',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partenaires', 'public');
        }

        $partenaire->update($data);

        return redirect()->route('partenaire.profile')->with('success', 'Profil mis à jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $partenaire = auth('partenaire')->user();

        if (!Hash::check($request->current_password, $partenaire->password)) {
            // Message personnalisé d'erreur
            return back()->with('password_error', 'Mot de passe actuel incorrect');
        }

        $partenaire->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Message personnalisé de succès
        return back()->with('password_success', 'Mot de passe mis à jour avec succès');
    }

    // ✅ Nouveau : suppression définitive du compte
    public function deleteAccount()
    {
        $partenaire = auth('partenaire')->user();

        Auth::guard('partenaire')->logout();

        $partenaire->delete();

        return redirect('/')->with('success', 'Votre compte a été supprimé définitivement.');
    }

    public function index()
    {
        $partenaireId = Auth::guard('partenaire')->id();

        $nombreH = Hebergement::where('idPartenaire', $partenaireId)->count();
        $nombreE = Evenement::where('idPartenaire', $partenaireId)->count();
        $nombreEx = Excursion::where('partenaire_id', $partenaireId)->count();
        $nombreV = Vol::where('idPartenaire', $partenaireId)->count();

        $user = Auth::guard('partenaire')->user();

        $properties = [
            [
                'icon' => 'mdi mdi-account-group-outline text-[28px]',
                'title' => "Nombre d'hébergements",
                'total' => $nombreH,
                'debut' => 0,
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

    public function show(Partenaire $partenaire)
    {
        $id = Auth::guard('partenaire')->id();

        $partenaire = Partenaire::with(['hebergements', 'excursions', 'evenements', 'vols'])->findOrFail($id);

        return view('screens.profile', compact('partenaire'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit(Partenaire $partenaire) {}
    public function update(Request $request, Partenaire $partenaire) {}
    public function destroy(Partenaire $partenaire) {}

    public function publicIndex(Request $request)
    {
        $partenaires = Partenaire::orderBy('nom_entreprise')->get(['id', 'nom_entreprise', 'type', 'siteWeb']);

        $agencies = $partenaires->map(function (Partenaire $p) {
            $relativeLogo = '/images/agency/1.png';

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
