@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')
@section('title', 'Nos Offres')

@section('content')

<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Nos Offres</h3>
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

<!-- Start -->
<section class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">

            {{-- Colonne filtres --}}
            <div class="lg:col-span-4 md:col-span-6">
                <div class="shadow dark:shadow-gray-700 p-6 rounded-xl bg-white dark:bg-slate-900 sticky top-20">
                    <form method="GET" action="{{ route('client.grid.sidebar') }}" id="filterForm">
                        <div class="grid grid-cols-1 gap-3">

                            {{-- Mots-clés --}}
                            <div>
                                <label for="searchname" class="font-medium text-slate-900 dark:text-white">Mots-clés</label>
                                <div class="relative mt-2">
                                    <i class="uil uil-search text-lg absolute top-[8px] start-3 text-slate-400"></i>
                                    <input name="search" id="searchname" type="text"
                                           value="{{ request('search') }}"
                                           class="form-input border border-slate-100 dark:border-slate-800 ps-10 w-full"
                                           placeholder="Ex: villa, plage, circuit, vol...">
                                </div>
                            </div>

                            {{-- Catégorie --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Catégorie</label>
                                <select name="categorie" class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                    <option value="">Toutes les catégories</option>
                                    <option value="hebergement" @selected(request('categorie')=='hebergement')>Hébergements</option>
                                    <option value="vol"         @selected(request('categorie')=='vol')>Vols</option>
                                    <option value="excursion"   @selected(request('categorie')=='excursion')>Excursions</option>
                                    <option value="evenement"   @selected(request('categorie')=='evenement')>Événements</option>
                                </select>
                            </div>

                            {{-- Prix minimum --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Prix minimum</label>
                                <input name="prix_min" type="number"
                                       class="form-input border border-slate-100 dark:border-slate-800 block w-full mt-1"
                                       placeholder="Min" value="{{ request('prix_min') }}">
                            </div>

                            {{-- Prix maximum --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Prix maximum</label>
                                <input name="prix_max" type="number"
                                       class="form-input border border-slate-100 dark:border-slate-800 block w-full mt-1"
                                       placeholder="Max" value="{{ request('prix_max') }}">
                            </div>

                            {{-- Actions --}}
                            <div class="flex gap-2">
                                <button type="submit"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full">
                                    Appliquer
                                </button>
                                <a href="{{ route('client.grid.sidebar') }}"
                                   class="btn bg-gray-200 hover:bg-gray-300 border-gray-200 hover:border-gray-300 text-gray-800 rounded-md">
                                    Réinitialiser
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Colonne résultats --}}
            <div class="lg:col-span-8 md:col-span-6">

                {{-- Compteur de résultats --}}
                <p class="text-sm text-slate-500 mb-4">
                    Résultats : <strong>{{ $items->total() }}</strong>
                </p>

                {{-- Grille des cards (données venant du controller) --}}
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px]">
                    @include('client.base.components.listing.listing-grid', ['items' => $items])
                </div>

                {{-- Pagination (conserve les filtres) --}}
                <div class="mt-8">
                    {{ $items->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End -->

@endsection
