@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')

@section('title', 'Détail de la commande')

@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Détail de la commande</h3>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-300 sm:mt-4">
                Voici le résumé complet de votre commande.
            </p>
        </div>
    </div>
</section>
<!-- End Hero -->

<div class="container mx-auto py-12 px-4 md:px-0">
    <h2 class="text-2xl font-semibold mb-6">Commande #{{ $order->ref }}</h2>

    <div class="mb-8 bg-white rounded-lg shadow p-6 text-black">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Informations client</h3>
        <p><strong>Nom :</strong> {{ $order->name }}</p>
        <p><strong>Téléphone :</strong> {{ $order->phone }}</p>
        <p><strong>Adresse :</strong> {{ $order->address }}, {{ $order->country }}</p>
        @if($order->notes)
        <p><strong>Notes :</strong> {{ $order->notes }}</p>
        @endif
        <p><strong>Méthode de paiement :</strong> {{ ucfirst($order->payment_method) }}</p>
        <p><strong>Date de commande :</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 text-black">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Produits commandés</h3>

        @php
        $products = $order->produits ?? [];
        @endphp


        @if(count($products) > 0)
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-3 text-left">Produit</th>
                    <th class="px-4 py-3 text-center">Quantité</th>
                    <th class="px-4 py-3 text-right">Prix unitaire</th>
                    <th class="px-4 py-3 text-right">Sous-total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="px-4 py-3 text-center">{{ $product->quantity }}</td>
                    <td class="px-4 py-3 text-right">{{ number_format($product->price, 2, ',', ' ') }} FCFA</td>
                    <td class="px-4 py-3 text-right">{{ number_format($product->subtotal, 2, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center py-4 text-gray-500">Aucun produit trouvé pour cette commande.</p>
        @endif
    </div>

    <div class="mt-6 text-right max-w-md ml-auto bg-white rounded-lg shadow p-6 text-black">
        <p class="mb-1"><strong>Total :</strong> {{ number_format($order->total, 2, ',', ' ') }} FCFA</p>
        <p class="mb-1"><strong>Frais de livraison :</strong> {{ number_format($order->shipping, 2, ',', ' ') }} FCFA</p>
        <p class="text-lg font-bold"><strong>Montant total :</strong> {{ number_format($order->grand_total, 2, ',', ' ') }} FCFA</p>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('client.profile.ordersHistory') }}" class="inline-block text-green-600 hover:underline font-semibold">
            ← Retour à l'historique des commandes
        </a>
    </div>
</div>
@endsection