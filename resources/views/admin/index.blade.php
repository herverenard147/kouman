@extends('layout.base')
@section('title', 'Tableau de bord Administrateur')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="layout-specing">

        {{-- En-tête de bienvenue --}}
        <div class="flex justify-between items-center">
            <div>
                <h5 class="text-xl font-semibold text-slate-900 dark:text-white">
                    Bonjour, {{ $admin->nom }}
                </h5>
                <h6 class="text-gray-600 dark:text-gray-300">
                    Bienvenue sur votre espace administrateur
                </h6>
            </div>
        </div>

        {{-- Cartes de statistiques --}}
        <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-6 gap-6">

            {{-- Clients --}}
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow flex flex-col">
                <div class="flex items-center justify-between">
                    <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Clients</h6>
                    <i class="mdi mdi-account-group text-green-600 text-3xl"></i>
                </div>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $stats['clients_count'] }}</p>
                <a href="{{ route('admin.clients.index') }}" class="text-sm text-blue-500 hover:underline mt-auto">
                    Gérer les clients
                </a>
            </div>

            {{-- Partenaires --}}
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow flex flex-col">
                <div class="flex items-center justify-between">
                    <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Partenaires</h6>
                    <i class="mdi mdi-handshake-outline text-green-600 text-3xl"></i>
                </div>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $stats['partners_count'] }}</p>
                <a href="{{ route('admin.partners.index') }}" class="text-sm text-blue-500 hover:underline mt-auto">
                    Gérer les partenaires
                </a>
            </div>

            {{-- Commandes --}}
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow flex flex-col">
                <div class="flex items-center justify-between">
                    <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Commandes</h6>
                    <i class="mdi mdi-cart-outline text-green-600 text-3xl"></i>
                </div>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $stats['orders_count'] }}</p>
                <a href="{{ route('admin.orders.index') }}" class="text-sm text-blue-500 hover:underline mt-auto">
                    Voir les commandes
                </a>
            </div>

            {{-- Revenus --}}
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow flex flex-col">
                <div class="flex items-center justify-between">
                    <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Revenus (Mois)</h6>
                    <i class="mdi mdi-cash-multiple text-green-600 text-3xl"></i>
                </div>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $stats['monthly_revenue'] }}</p>
                <a href="#" class="text-sm text-blue-500 hover:underline mt-auto">Voir les rapports</a>
            </div>
        </div>

        {{-- Analyse et données --}}
        <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
            <div class="lg:col-span-8">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Analyse des revenus</h6>
                        <select class="form-select w-40 py-1 rounded border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                            <option>Annuel</option>
                            <option>Mensuel</option>
                            <option>Hebdomadaire</option>
                            <option>Aujourd'hui</option>
                        </select>
                    </div>
                    <div id="mainchart" class="apex-chart px-4 pb-6"></div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Données de ventes</h6>
                        <select class="form-select w-40 py-1 rounded border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                            <option>Annuel</option>
                            <option>Mensuel</option>
                            <option>Hebdomadaire</option>
                            <option>Aujourd'hui</option>
                        </select>
                    </div>
                    <div class="p-6">
                        @include('base.components.dashboard.sales-data')
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection