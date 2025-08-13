<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Commande;
use App\Models\CommandeProduit;

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
            // 'photo_profil' => gérer upload fichier si besoin
        ]);

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire mis à jour avec succès.');
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

        // Charger les commandes avec leurs produits
        $commandes = Commande::whereIn('id', $commandeIds)->with('produits')->get();

        // Passer $commandes à la vue aussi !
        return view('admin.partenaire.orders', compact('partner', 'commandes'));
    }
}
