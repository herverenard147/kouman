@extends('content.no-sidebar')
@extends('client.base.style.base')
@section('title', 'Confirmation de commande')

@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Confirmation de Commande</h3>
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
<div class="min-h-screen bg-white dark:bg-slate-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200 bg-green-50">
                <h1 class="text-3xl font-extrabold text-green-700">Merci ! Votre commande a été confirmée ✅</h1>
                <p class="mt-2 text-gray-700">Référence : <strong>{{ $order['ref'] }}</strong></p>
                <p class="text-gray-500">Date : {{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-0">
                <!-- Client -->
                <div class="p-8 border-r border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Informations client</h2>
                    <ul class="space-y-2 text-gray-700">
                        <li><span class="font-medium">Nom :</span> {{ $order['customer']['name'] }}</li>
                        <li><span class="font-medium">Téléphone :</span> {{ $order['customer']['phone'] }}</li>
                        <li><span class="font-medium">Adresse :</span> {{ $order['customer']['address'] }}</li>
                        <li><span class="font-medium">Pays :</span> {{ $order['customer']['country'] }}</li>
                        @if(!empty($order['customer']['notes']))
                        <li><span class="font-medium">Notes :</span> {{ $order['customer']['notes'] }}</li>
                        @endif
                        <li class="mt-4"><span class="font-medium">Paiement :</span>
                            @switch($order['payment_method'])
                            @case('momo') Mobile Money @break
                            @case('card') Carte bancaire @break
                            @case('cash') Paiement à la livraison @break
                            @default {{ strtoupper($order['payment_method']) }}
                            @endswitch
                        </li>
                    </ul>
                </div>

                <!-- Récap -->
                <!-- RÉCAPITULATIF -->
                <div class="p-0">
                    {{-- En-tête du bloc --}}
                    <div class="px-8 pt-8 pb-6 border-b border-gray-200 bg-gray-50">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Récapitulatif de la commande</h2>
                                @if(!empty($order['ref']) || !empty($order['created_at']))
                                <p class="mt-1 text-sm text-gray-500">
                                    @if(!empty($order['ref']))
                                    <span class="font-medium text-gray-700">Réf :</span> {{ $order['ref'] }}
                                    @endif
                                    @if(!empty($order['created_at']))
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="font-medium text-gray-700">Date :</span> {{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}
                                    @endif
                                </p>
                                @endif
                            </div>

                            {{-- Méthode de paiement --}}
                            @php
                            $pm = $order['payment_method'] ?? null;
                            $pmLabel = [
                            'momo' => 'Mobile Money',
                            'card' => 'Carte bancaire',
                            'cash' => 'Paiement à la livraison'
                            ][$pm] ?? 'Paiement';
                            @endphp
                            @if($pm)
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-50 text-green-500 border border-indigo-100 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                    @if($pm === 'momo')
                                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.69l1.5 4.49a1 1 0 01-.5 1.2l-2.26 1.13a11.04 11.04 0 005.52 5.52l1.13-2.26a1 1 0 011.2-.5l4.5 1.5a1 1 0 01.69.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z" />
                                    @elseif($pm === 'card')
                                    <path d="M3 7a2 2 0 012-2h14a2 2 0 012 2v1H3V7zm18 3v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7h18z" />
                                    @else
                                    <path d="M3 7h18v10a2 2 0 01-2 2H7a4 4 0 01-4-4V7z" />
                                    @endif
                                </svg>
                                <span class="text-sm font-medium">{{ $pmLabel }}</span>
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Liste des lignes produits --}}
                    <div class="px-8 py-6">
                        @php
                        // Couleurs par catégorie (mini-système de badges)
                        $catColors = [
                        'hebergement' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                        'vol' => 'bg-sky-50 text-sky-700 border-sky-100',
                        'excursion' => 'bg-amber-50 text-amber-700 border-amber-100',
                        'evenement' => 'bg-fuchsia-50 text-fuchsia-700 border-fuchsia-100',
                        ];
                        @endphp

                        <ul class="space-y-4">
                            @foreach($order['lines'] as $line)
                            <li class="group rounded-2xl border border-gray-100 bg-white p-4 hover:shadow-md transition">
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 sm:gap-6">
                                    {{-- Image --}}
                                    <div class="sm:col-span-2">
                                        <div class="h-20 w-full sm:w-28 rounded-xl overflow-hidden border border-gray-200 bg-gray-50">
                                            <img src="{{ $line['image'] ?? 'https://via.placeholder.com/160x120?text=Image' }}"
                                                alt="{{ $line['name'] }}"
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>

                                    {{-- Infos produit --}}
                                    <div class="sm:col-span-7">
                                        <div class="flex items-start justify-between gap-2">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 leading-snug">
                                                {{ $line['name'] }}
                                            </h3>

                                            {{-- Prix unitaire visible en mobile/étroit --}}
                                            <div class="sm:hidden text-right">
                                                <div class="text-sm text-gray-500">{{ number_format($line['price'], 0, ',', ' ') }} FCFA</div>
                                                <div class="text-base font-semibold text-gray-900">
                                                    {{ number_format($line['subtotal'], 0, ',', ' ') }} FCFA
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2 flex flex-wrap items-center gap-2">
                                            {{-- Badge catégorie --}}
                                            @if(!empty($line['categorie']))
                                            @php $cls = $catColors[$line['categorie']] ?? 'bg-gray-50 text-gray-700 border-gray-100'; @endphp
                                            <span class="text-[11px] px-2.5 py-1 rounded-full border {{ $cls }}">
                                                {{ ucfirst($line['categorie']) }}
                                            </span>
                                            @endif

                                            {{-- Quantité --}}
                                            <span class="inline-flex items-center gap-1.5 text-xs text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M7 11h10v2H7z" />
                                                </svg>
                                                Qté : <span class="font-semibold text-gray-800">{{ $line['quantity'] }}</span>
                                            </span>
                                        </div>

                                        {{-- Partenaire --}}
                                        @if(!empty($line['partenaire']))
                                        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                                            <div class="flex items-center gap-2 text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 3l8 4v6c0 5-3.8 7.8-8 8-4.2-.2-8-3-8-8V7l8-4z" />
                                                </svg>
                                                <span class="font-medium text-gray-900">Partenaire :</span>
                                                <span>{{ $line['partenaire']['nom'] ?? '—' }}</span>
                                            </div>

                                            @if(!empty($line['partenaire']['telephone']))
                                            <div class="flex items-center gap-2 text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M2 5a2 2 0 012-2h3a1 1 0 01.95.69l1 3a1 1 0 01-.3 1.06L7.6 9.4a11 11 0 006.99 6.99l1.65-1.65a1 1 0 011.06-.3l3 1A1 1 0 0121 17v3a2 2 0 01-2 2h-1C9.16 22 2 14.84 2 6V5z" />
                                                </svg>
                                                <span>{{ $line['partenaire']['telephone'] }}</span>
                                            </div>
                                            @endif

                                            @if(!empty($line['partenaire']['email']))
                                            <div class="flex items-center gap-2 text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M20 4H4a2 2 0 00-2 2v.4l10 6.25L22 6.4V6a2 2 0 00-2-2zm0 4.85l-8 5-8-5V18a2 2 0 002 2h12a2 2 0 002-2V8.85z" />
                                                </svg>
                                                <span>{{ $line['partenaire']['email'] }}</span>
                                            </div>
                                            @endif

                                            @if(!empty($line['partenaire']['adresse']))
                                            <div class="flex items-center gap-2 text-gray-700 md:col-span-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                                </svg>
                                                <span class="truncate">{{ $line['partenaire']['adresse'] }}</span>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    {{-- Prix (desktop) --}}
                                    <div class="sm:col-span-3 hidden sm:flex sm:flex-col sm:items-end">
                                        <div class="text-sm text-gray-500">{{ number_format($line['price'], 0, ',', ' ') }} FCFA</div>
                                        <div class="text-lg font-bold text-gray-900 mt-1">
                                            {{ number_format($line['subtotal'], 0, ',', ' ') }} FCFA
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        {{-- Totaux --}}
                        <div class="mt-8 p-5 rounded-2xl border border-gray-100 bg-gradient-to-br from-gray-50 to-white">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Sous-total</span>
                                    <span class="text-gray-900 font-medium">{{ number_format($order['total'], 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Livraison</span>
                                    <span class="text-emerald-600 font-medium">Gratuite</span>
                                </div>
                            </div>

                            <div class="mt-4 pt-4 border-t border-dashed border-gray-200 flex items-center justify-between">
                                <span class="text-lg font-semibold text-gray-900">Total TTC</span>
                                <span class="text-2xl font-extrabold bg-clip-text text-transparent bg-green-500">
                                    {{ number_format($order['grand_total'], 0, ',', ' ') }} FCFA
                                </span>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
                            <a href="{{ route('client.grid.sidebar') }}"
                                class="inline-flex items-center justify-center px-4 py-3 rounded-xl bg-white border border-gray-200 text-indigo-700 hover:bg-indigo-50 font-medium shadow-sm">
                                ← Continuer mes achats
                            </a>

                            <a href="{{ route('client.index') }}"
                                class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow">
                                Retour à l’accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection