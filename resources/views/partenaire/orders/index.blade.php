@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('layout.base')

@section('title', 'Commandes Partenaire')

@section('content')
<!-- Hero -->
{{-- <section class="relative w-full py-28 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative text-center text-white">
        <h1 class="text-4xl font-extrabold">Commandes Partenaire</h1>
        <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-300">
            Gérez vos commande en toute simplicité.
        </p>
    </div>
</section>

<div class="relative bg-white dark:bg-slate-900 py-12"> --}}

<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                {{-- Titre de la page: Maintenant visible sur un fond sombre général --}}
                <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Vos commandes</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    {{-- Lien de fil d'Ariane normal: Visible sur fond sombre --}}
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                        <a href="{{route('partenaire.dashboard')}}">Afrique évasion</a>
                    </li>
                    {{-- Séparateur de fil d'Ariane: Visible sur fond sombre --}}
                    <li class="inline-block text-base mx-0.5 ltr:rotate-0 rtl:rotate-180 text-gray-500 dark:text-gray-400">
                        <i class="mdi mdi-chevron-right"></i>
                    </li>
                    {{-- Élément actif du fil d'Ariane: La couleur verte reste bien contrastée --}}
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Commandes</li>
                </ul>
            </div>
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
                    <div class="flex items-center justify-center min-h-screen">
                        <p class="text-gray-500 text-lg text-center">
                            Aucune commande pour le moment.
                        </p>
                    </div>
                @endforelse

                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
