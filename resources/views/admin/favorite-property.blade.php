@extends('layout.base')
@section('title', 'Favorite Properties')
@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                {{-- Titre de la page: Maintenant visible sur un fond sombre général --}}
                <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Favorite Properties</h5>

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
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Properties</li>
                </ul>
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                {{-- Important: Ensure 'properties1' (your included component) also has dark mode classes for its internal elements. --}}
                {{-- If 'properties1' itself is a card, it should have a dark:bg-slate-800 or similar. --}}
                @include('base.components.Favorite-Properties.properties1')
            </div>{{-- Re-opening the 'div' tag for grid here as it was prematurely closed in your provided code. --}}
            <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                <div class="md:col-span-12 text-center">
                    <nav>
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                {{-- Bouton de pagination (flèche gauche): S'adapte au mode sombre, avec bordure --}}
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full shadow-sm
                                    text-slate-400 dark:text-gray-400
                                    bg-white dark:bg-slate-800
                                    border border-gray-200 dark:border-slate-700
                                    hover:text-white hover:border-green-600 hover:bg-green-600">
                                    <i class="mdi mdi-chevron-left text-[20px]"></i>
                                </a>
                            </li>
                            <li>
                                {{-- Bouton de pagination numérique: S'adapte au mode sombre, avec bordure --}}
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full shadow-sm
                                    text-slate-400 dark:text-gray-400
                                    bg-white dark:bg-slate-800
                                    border border-gray-200 dark:border-slate-700
                                    hover:text-white hover:border-green-600 hover:bg-green-600">1</a>
                            </li>
                            <li>
                                {{-- Bouton de pagination numérique: S'adapte au mode sombre, avec bordure --}}
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full shadow-sm
                                    text-slate-400 dark:text-gray-400
                                    bg-white dark:bg-slate-800
                                    border border-gray-200 dark:border-slate-700
                                    hover:text-white hover:border-green-600 hover:bg-green-600">2</a>
                            </li>
                            <li>
                                {{-- Bouton de pagination actif: La couleur est déjà bien contrastée, pas de dark: nécessaire --}}
                                <a href="#" aria-current="page" class="z-10 size-10 inline-flex justify-center items-center mx-1 rounded-full text-white bg-green-600 shadow-sm">3</a>
                            </li>
                            <li>
                                {{-- Bouton de pagination numérique: S'adapte au mode sombre, avec bordure --}}
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full shadow-sm
                                    text-slate-400 dark:text-gray-400
                                    bg-white dark:bg-slate-800
                                    border border-gray-200 dark:border-slate-700
                                    hover:text-white hover:border-green-600 hover:bg-green-600">4</a>
                            </li>
                            <li>
                                {{-- Bouton de pagination (flèche droite): S'adapte au mode sombre, avec bordure --}}
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full shadow-sm
                                    text-slate-400 dark:text-gray-400
                                    bg-white dark:bg-slate-800
                                    border border-gray-200 dark:border-slate-700
                                    hover:text-white hover:border-green-600 hover:bg-green-600">
                                    <i class="mdi mdi-chevron-right text-[20px]"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
