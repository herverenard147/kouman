@extends('layout.base')
@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="layout-specing">
        <div class="flex justify-between items-center">
            <div>
                <h5 class="text-xl font-semibold text-slate-900 dark:text-white">Bonjour, {{ $user->nom_entreprise }}</h5>
                {{-- Modifié: text-slate-400 -> text-gray-600 pour un meilleur contraste en mode clair --}}
                {{-- Modifié: dark:text-slate-400 -> dark:text-gray-300 pour un meilleur contraste en mode sombre --}}
                {{-- <h6 class="text-gray-600 dark:text-gray-300">Ravi de vous revoir !</h6> --}}
            </div>
        </div>

        <div class="grid xl:grid-cols-5 md:grid-cols-3 grid-cols-1 mt-6 gap-6">
            @include('base.components.dashboard.total-properties', [
                'properties' => $properties,
            ])
        </div>

        <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
            <div class="lg:col-span-8">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    {{-- Modifié: border-gray-100 -> border-gray-200 pour une meilleure visibilité en mode clair --}}
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Analyse des revenus</h6>

                        <div class="position-relative w-48">
                            <select
                                id="yearchart"
                                class="form-select form-input w-full py-2 h-10 rounded border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                       focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                            >
                                <option value="Y" selected>Annuel</option>
                                <option value="M">Mensuel</option>
                                <option value="W">Hebdomadaire</option>
                                <option value="T">Aujourd'hui</option>
                            </select>
                        </div>
                    </div>
                    <div id="mainchart" class="apex-chart px-4 pb-6"></div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    {{-- Modifié: border-gray-100 -> border-gray-200 pour une meilleure visibilité en mode clair --}}
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Données de ventes</h6>

                        <div class="position-relative w-48">
                            <select
                                id="yearchart-sales"
                                class="form-select form-input w-full py-2 h-10 rounded border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                       focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                            >
                                <option value="Y" selected>Annuel</option>
                                <option value="M">Mensuel</option>
                                <option value="W">Hebdomadaire</option>
                                <option value="T">Aujourd'hui</option>
                            </select>
                        </div>
                    </div>

                    <div class="p-6">
                        @include('base.components.dashboard.sales-data')
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
            <div class="xl:col-span-3 lg:col-span-6 order-1">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    {{-- Modifié: border-gray-100 -> border-gray-200 pour une meilleure visibilité en mode clair --}}
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Carte des zones</h6>
                        {{-- Modifié: text-slate-400 -> text-gray-600 et dark:text-slate-400 -> dark:text-gray-300 --}}
                        <span class="text-gray-600 dark:text-gray-300">Dernière mise à jour il y a 5 jours</span>
                    </div>

                    <div class="p-6">
                        <div id="map" class="w-full h-[236px]"></div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-6 lg:col-span-12 xl:order-2 order-3">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    {{-- Modifié: border-gray-100 -> border-gray-200 pour une meilleure visibilité en mode clair --}}
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Transactions récentes</h6>

                        {{-- Modifié: text-slate-400 -> text-gray-600 et dark:text-slate-400 -> dark:text-green-400 --}}
                        <a href="" class="btn btn-link font-normal text-gray-600 dark:text-green-400 hover:text-green-600 after:bg-green-600 transition duration-500">
                            Voir les commandes <i class="mdi mdi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="relative overflow-x-auto block w-full xl:max-h-[284px] max-h-[350px]" data-simplebar>
                        <table class="w-full text-start">
                            <thead class="text-base">
                                <tr>
                                    <th class="text-start font-semibold text-[15px] px-4 py-3"></th>
                                    <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[140px] text-slate-900 dark:text-white">Date</th>
                                    <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[120px] text-slate-900 dark:text-white">Nom</th>
                                    <th class="text-start font-semibold text-[15px] px-4 py-3 text-slate-900 dark:text-white">Prix</th>
                                    <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[40px] text-slate-900 dark:text-white">Type</th>
                                    <th class="text-end font-semibold text-[15px] px-4 py-3 min-w-[70px] text-slate-900 dark:text-white">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('base.components.dashboard.recent-transections')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-3 lg:col-span-6 xl:order-3 order-2">
                <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
                    {{-- Modifié: border-gray-100 -> border-gray-200 pour une meilleure visibilité en mode clair --}}
                    <div class="p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                        <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Meilleures propriétés</h6>

                        {{-- Modifié: text-slate-400 -> text-gray-600 et dark:text-slate-400 -> dark:text-green-400 --}}
                        <a href="" class="btn btn-link font-normal text-gray-600 dark:text-green-400 hover:text-green-600 after:bg-green-600 transition duration-500">
                            Voir plus <i class="mdi mdi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="relative overflow-x-auto block w-full max-h-[284px] p-6" data-simplebar>
                        @include('base.components.dashboard.top-properties')
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
@endsection
