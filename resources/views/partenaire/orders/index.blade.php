@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')

@section('title', 'Commandes Partenaire')

@section('content')
<!-- Hero -->
<section class="relative w-full py-28 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative text-center text-white">
        <h1 class="text-4xl font-extrabold">Commandes Partenaire</h1>
        <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-300">
            Gérez vos commande en toute simplicité.
        </p>
    </div>
</section>

<div class="relative bg-white dark:bg-slate-900 py-12">
    <div class="container mx-auto px-4">
        @forelse ($orders as $order)
        <div class="mb-10 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-green-600 text-white px-6 py-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold">Commande {{ $order->ref }}</h2>
                <span class="text-sm">{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="px-6 py-4 bg-gray-50 dark:bg-slate-800">
                <p class="mb-2 text-gray-800 dark:text-gray-200">
                    <strong>Client :</strong> {{ $order->name }} <br>
                    <strong>Téléphone :</strong> {{ $order->phone }} <br>
                    <strong>Méthode de paiement :</strong> {{ ucfirst($order->payment_method) }}
                </p>


                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-slate-700 text-gray-700 dark:text-gray-300 uppercase text-xs">
                                <th class="px-4 py-2">Produit</th>
                                <th class="px-4 py-2">Catégorie</th>
                                <th class="px-4 py-2">Quantité</th>
                                <th class="px-4 py-2">Prix unitaire</th>
                                <th class="px-4 py-2">Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->produits as $produit)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-slate-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-base font-semibold text-gray-900 dark:text-white">{{ $produit->name }}</div>
                                            <div class="text-xs text-gray-500 mt-1">Catégorie: {{ ucfirst($produit->categorie) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">{{ ucfirst($produit->categorie) }}</td>
                                <td class="px-4 py-3">{{ $produit->quantity }}</td>
                                <td class="px-4 py-3">{{ number_format($produit->price, 2, ',', ' ') }} FCFA</td>
                                <td class="px-4 py-3 font-semibold">{{ number_format($produit->subtotal, 2, ',', ' ') }} FCFA</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-100 dark:bg-slate-800 font-semibold text-gray-900 dark:text-white">
                                <td colspan="4" class="px-4 py-3 text-right">Total</td>
                                <td class="px-4 py-3">{{ number_format($order->total, 2, ',', ' ') }} FCFA</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500 dark:text-gray-400">Aucune commande pour le moment.</p>
        @endforelse

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection