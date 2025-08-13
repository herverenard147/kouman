<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        // dd($clients); // Pour déboguer et vérifier les données récupérées
        return view('admin.client.client-list', compact('clients'));
    }


    public function create()
    {
        // Formulaire de création
    }

    public function store(Request $request)
    {
        // Sauvegarde d'un nouveau client
    }

    public function show($id)
    {
        // Détails d'un client
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.client-edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:100',
            'pays' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
            'genre' => 'nullable|string|max:20',
            'langue_preferee' => 'nullable|string|max:10',
            'newsletter' => 'nullable|boolean',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion upload photo
        if ($request->hasFile('photo_profil')) {
            // Supprimer ancienne photo si besoin
            if ($client->photo_profil && Storage::exists($client->photo_profil)) {
                Storage::delete($client->photo_profil);
            }

            $path = $request->file('photo_profil')->store('clients/photos', 'public');
            $validated['photo_profil'] = $path;
        }

        // Mise à jour du client
        $client->update($validated);

        return redirect()->route('admin.clients.edit', $client->id)
            ->with('success', 'Client mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Supprimer la photo de profil si elle existe
        if ($client->photo_profil && Storage::exists($client->photo_profil)) {
            Storage::delete($client->photo_profil);
        }

        // Supprimer le client
        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }


    public function orders($id)
    {
        $client = Client::findOrFail($id);

        $commandes = $client->commandes()->with('produits')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.client.orders', compact('client', 'commandes'));
    }
}
