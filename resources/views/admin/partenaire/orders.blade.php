@extends('layout.base')
@section('title', 'Commandes du partenaire')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-16 pb-12">
    <div class="container mx-auto px-6 max-w-5xl py-16">
        {{-- En-tête --}}
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold  dark:text-black">
                Commandes liées au partenaire
                <span class="text-blue-600 dark:text-blue-400">{{ $partner->nom_entreprise }}</span>
            </h1>
            <hr class="mt-3 border-gray-300 dark:border-gray-700" />
        </header>

        @if($commandes->isEmpty())
        <div class="max-w-md mx-auto p-6 bg-red-100 text-red-800 rounded-md shadow-md text-center">
            <p class="text-lg font-medium">Aucune commande pour ce partenaire.</p>
        </div>
        @else
        <div class="overflow-x-auto rounded-lg shadow border border-gray-300 dark:border-gray-700">
            <table class="min-w-full table-auto border-collapse text-gray-800 dark:text-gray-200">
                <thead class="bg-gray-200 dark:bg-gray-800 text-left">
                    <tr>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Référence</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Date</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Client</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Total</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Produits</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                    <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-slate-800 dark:even:bg-slate-700">
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700 font-mono">{{ $commande->ref }}</td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">{{ $commande->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">
                            @if($commande->client)
                            <a href="{{ route('admin.clients.orders', $commande->client->id) }}" class="font-semibold text-blue-600 hover:underline">
                                {{ $commande->client->nom ?? 'Nom non renseigné' }} {{ $commande->client->prenom ?? '' }}
                            </a><br>
                            <a href="mailto:{{ $commande->client->email ?? '' }}" class="text-blue-600 hover:underline">
                                {{ $commande->client->email ?? 'Email non renseigné' }}
                            </a>
                            @else
                            <span class="italic text-gray-500">Client non trouvé</span>
                            @endif
                        </td>


                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700 font-semibold">
                            {{ number_format($commande->grand_total, 0, ',', ' ') }} FCFA
                        </td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">
                            <ul class="list-disc pl-5 max-h-32 overflow-auto">
                                @foreach($commande->produits as $produit)
                                @if($produit->partenaire_id === $partner->id)
                                {{ $produit->name }} (x{{ $produit->quantity }})
                                @endif
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @endif
    </div>
</div>
@endsection