@extends('layout.base')
@section('title', 'Commandes du client')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-16 pb-12 py-16">
    <div class="container mx-auto px-6 max-w-5xl py-16 rounded shadow bg-white dark:bg-slate-900">
        {{-- En-tête --}}
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold dark:text-white">
                Commandes de
                <span class="text-blue-600 dark:text-blue-400">{{ $client->prenom }} {{ $client->nom }}</span>
            </h1>
            <hr class="mt-3 border-gray-300 dark:border-gray-700" />
        </header>

        @if($client->commandes->isEmpty())
        <div class="max-w-md mx-auto p-6 bg-red-100 text-red-800 rounded-md shadow-md text-center">
            <p class="text-lg font-medium">Aucune commande pour ce client.</p>
        </div>
        @else
        <div class="overflow-x-auto rounded-lg shadow border border-gray-300 dark:border-gray-700">
            <table class="min-w-full table-auto border-collapse text-gray-800 dark:text-gray-200">
                <thead class="bg-gray-200 dark:bg-gray-800 text-left">
                    <tr>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Référence</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Date</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Total (FCFA)</th>
                        <th class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">Produits</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client->commandes as $commande)
                    <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-slate-800 dark:even:bg-slate-700">
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700 font-mono">{{ $commande->ref }}</td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">{{ $commande->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700 font-semibold text-right">
                            {{ number_format($commande->grand_total, 2, ',', ' ') }}
                        </td>
                        <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">
                            <ul class="list-disc pl-5 max-h-40 overflow-auto space-y-1">
                                @foreach($commande->produits as $produit)

                                {{ $produit->name }} (x{{ $produit->quantity }})
                                @if($produit->partenaire)
                                - <span class="italic text-gray-600 dark:text-gray-400">
                                    Partenaire :
                                    <a href="{{ route('admin.partners.orders', $produit->partenaire->id) }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $produit->partenaire->nom_entreprise }}
                                    </a>
                                </span>
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