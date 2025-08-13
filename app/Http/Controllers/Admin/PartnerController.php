<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Commande;
use App\Models\CommandeProduit;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partenaire::all();
        return view('admin.partenaire.partner-list', compact('partners'));
    }

    public function create()
    {
        return view('admin.partenaire.partner-add');
    }

    public function store(Request $request)
    {
        // Validation simple (à adapter)
        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:20',
            // ajoute d'autres champs si besoin
        ]);

        Partenaire::create($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire ajouté avec succès.');
    }

    public function edit($id)
    {
        $partner = Partenaire::findOrFail($id);
        return view('admin.partenaire.partner-edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partenaire::findOrFail($id);

        $validated = $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'type' => 'nullable|string|max:100',
            'adresse' => 'nullable|string|max:255',
            'siteWeb' => 'nullable|url|max:255',
            'statut' => 'nullable|string|max:50',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion upload photo
        if ($request->hasFile('photo_profil')) {
            // Supprimer ancienne photo si besoin
            if ($partner->photo_profil && Storage::exists($partner->photo_profil)) {
                Storage::delete($partner->photo_profil);
            }

            $path = $request->file('photo_profil')->store('partners/photos', 'public');
            $validated['photo_profil'] = $path;
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.edit', $partner->id)
            ->with('success', 'Partenaire mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $partner = Partenaire::findOrFail($id);
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire supprimé avec succès.');
    }

    public function orders($id)
    {
        $partner = Partenaire::findOrFail($id);

        // Récupérer les IDs des commandes contenant ses produits
        $commandeIds = CommandeProduit::where('partenaire_id', $partner->id)
            ->pluck('commande_id')
            ->unique();

        // Charger les commandes avec leurs produits ET pagination
        $commandes = Commande::whereIn('id', $commandeIds)
            ->with('produits')
            ->orderBy('created_at', 'desc')  // optionnel mais conseillé pour tri
            ->paginate(10);

        return view('admin.partenaire.orders', compact('partner', 'commandes'));
    }
}
