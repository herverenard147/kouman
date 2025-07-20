@extends('layout.base')
@section('title', 'Tableau de bord')

@section('content')
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Début du contenu -->
            <div class="flex justify-between items-center">
                <div>
                    <h5 class="text-xl font-semibold">Bonjour, {{ $user->nom_entreprise }}</h5>
                    <h6 class="text-slate-400">Ravi de vous revoir !</h6>
                </div>
            </div>

            <div class="grid xl:grid-cols-5 md:grid-cols-3 grid-cols-1 mt-6 gap-6">
                <!-- Propriétés totales -->
                @include('base.components.Dashboard.total-properties', [
                    'properties' => $properties,
                ])

            </div>

            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
                <div class="lg:col-span-8">
                    <div class="relative overflow-hidden rounded-md shadow bg-white">
                        <div class="p-6 flex items-center justify-between border-b border-gray-100">
                            <h6 class="text-lg font-semibold">Analyse des revenus</h6>

                            <div class="position-relative">
                                <select class="form-select form-input w-full py-2 h-10 bg-white rounded outline-none border border-gray-100 focus:border-gray-200 focus:ring-0" id="yearchart">
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
                    <div class="relative overflow-hidden rounded-md shadow bg-white">
                        <div class="p-6 flex items-center justify-between border-b border-gray-100">
                            <h6 class="text-lg font-semibold">Données de ventes</h6>

                            <div class="position-relative">
                                <select class="form-select form-input w-full py-2 h-10 bg-white rounded outline-none border border-gray-100 focus:border-gray-200 focus:ring-0" id="yearchart">
                                    <option value="Y" selected>Annuel</option>
                                    <option value="M">Mensuel</option>
                                    <option value="W">Hebdomadaire</option>
                                    <option value="T">Aujourd'hui</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-6">
                            <!-- Données de ventes -->
                            @include('base.components.Dashboard.sales-data')
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
                <div class="xl:col-span-3 lg:col-span-6 order-1">
                    <div class="relative overflow-hidden rounded-md shadow bg-white">
                        <div class="p-6 flex items-center justify-between border-b border-gray-100">
                            <h6 class="text-lg font-semibold">Carte des zones</h6>
                            <span class="text-slate-400">Dernière mise à jour il y a 5 jours</span>
                        </div>

                        <div class="p-6">
                            <div id="map" class="w-full h-[236px]"></div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-6 lg:col-span-12 xl:order-2 order-3">
                    <div class="relative overflow-hidden rounded-md shadow bg-white">
                        <div class="p-6 flex items-center justify-between border-b border-gray-100">
                            <h6 class="text-lg font-semibold">Transactions récentes</h6>

                            <a href="" class="btn btn-link font-normal text-slate-400 hover:text-green-600 after:bg-green-600 transition duration-500">Voir les commandes <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>

                        <div class="relative overflow-x-auto block w-full xl:max-h-[284px] max-h-[350px]" data-simplebar>
                            <table class="w-full text-start">
                                <thead class="text-base">
                                    <tr>
                                        <th class="text-start font-semibold text-[15px] px-4 py-3"></th>
                                        <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[140px]">Date</th>
                                        <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[120px]">Nom</th>
                                        <th class="text-start font-semibold text-[15px] px-4 py-3">Prix</th>
                                        <th class="text-start font-semibold text-[15px] px-4 py-3 min-w-[40px]">Type</th>
                                        <th class="text-end font-semibold text-[15px] px-4 py-3 min-w-[70px]">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Transactions récentes -->
                                    @include('base.components.Dashboard.recent-transections')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-3 lg:col-span-6 xl:order-3 order-2">
                    <div class="relative overflow-hidden rounded-md shadow bg-white">
                        <div class="p-6 flex items-center justify-between border-b border-gray-100">
                            <h6 class="text-lg font-semibold">Meilleures propriétés</h6>

                            <a href="" class="btn btn-link font-normal text-slate-400 hover:text-green-600 after:bg-green-600 transition duration-500">Voir plus <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>

                        <div class="relative overflow-x-auto block w-full max-h-[284px] p-6" data-simplebar>
                            <!-- Meilleures propriétés -->
                            @include('base.components.Dashboard.top-properties')
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin du contenu -->
        </div>
    </div><!-- Fin du container -->
@endsection
