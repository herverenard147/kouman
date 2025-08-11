@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')

@section('title', 'Historique des commandes')

@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Historique des commandes</h3>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
                Gérez vos historiques de commande !
            </p>
        </div>
    </div>
</section>
<div class="relative">
    <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Historique de vos commandes</h1>

    @if($orders->count() > 0)
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-black">
                    <th class="px-4 py-2">Référence</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $order->ref }}</td>
                    <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2">{{ number_format($order->total, 2, ',', ' ') }} FCFA</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('client.orders.show', $order->id) }}" class="text-green-600 hover:underline">
                            Voir détails
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @else
        <p>Aucune commande trouvée.</p>
    @endif
</div>
@endsection
