@php
    $page = 'light';
    $fpage = 'foot';
@endphp
@extends('client.base.style.base')
@section('title', 'Nos Offres')
@section('content')
<!-- Start Hero -->
<section
    class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Nos Offres
            </h3>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<div class="relative">
    <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

<!-- Start -->
<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-4 md:col-span-6">
                <div class="shadow dark:shadow-gray-700 p-6 rounded-xl bg-white dark:bg-slate-900 sticky top-20">
                    <form method="GET" action="{{ route('client.grid.sidebar') }}">
                        <div class="grid grid-cols-1 gap-3">

                            {{-- Mots-clés --}}
                            <div>
                                <label for="searchname" class="font-medium text-slate-900 dark:text-white">Mots-clés</label>
                                <div class="relative mt-2">
                                    <i class="uil uil-search text-lg absolute top-[8px] start-3 text-slate-400"></i>
                                    <input name="search" id="searchname" type="text"
                                        class="form-input border border-slate-100 dark:border-slate-800 ps-10 w-full"
                                        placeholder="Ex: villa, plage, circuit, vol...">
                                </div>
                            </div>

                            {{-- Catégorie principale --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Catégorie</label>
                                <select name="categorie"
                                    class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1"
                                    onchange="this.form.submit()">
                                    <option value="">Toutes les catégories</option>
                                    <option value="hebergement" {{ request('categorie') == 'hebergement' ? 'selected' : '' }}>Hébergements</option>
                                    <option value="vol" {{ request('categorie') == 'vol' ? 'selected' : '' }}>Vols</option>
                                    <option value="excursion" {{ request('categorie') == 'excursion' ? 'selected' : '' }}>Excursions</option>
                                    <option value="evenement" {{ request('categorie') == 'evenement' ? 'selected' : '' }}>Événements</option>
                                </select>
                            </div>

                            {{-- Type selon catégorie choisie --}}
                            @if(!empty($types))
                                <div>
                                    <label class="font-medium text-slate-900 dark:text-white">Type</label>
                                    <select name="type"
                                        class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                        <option value="">Tous les types</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            {{-- Localisation --}}
                            @if(!empty($localisations))
                                <div>
                                    <label class="font-medium text-slate-900 dark:text-white">Localisation</label>
                                    <select name="localisation"
                                        class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                        <option value="">Toutes les localisations</option>
                                        @foreach($localisations as $loc)
                                            <option value="{{ $loc }}" {{ request('localisation') == $loc ? 'selected' : '' }}>
                                                {{ $loc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            {{-- Prix minimum --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Prix minimum</label>
                                <input name="prix_min" type="number"
                                    class="form-input form-input border border-slate-100 dark:border-slate-800 block w-full mt-1"
                                    placeholder="Min" value="{{ request('prix_min') }}">
                            </div>

                            {{-- Prix maximum --}}
                            <div>
                                <label class="font-medium text-slate-900 dark:text-white">Prix maximum</label>
                                <input name="prix_max" type="number"
                                    class="form-input form-input border border-slate-100 dark:border-slate-800 block w-full mt-1"
                                    placeholder="Max" value="{{ request('prix_max') }}">
                            </div>

                            {{-- Bouton de recherche --}}
                            <div>
                                <input type="submit"
                                    class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full"
                                    value="Appliquer le filtre">
                            </div>
                        </div>
                    </form>
                </div>

            </div><!--end col-->


            


            <div class="lg:col-span-8 md:col-span-6">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px]">

                    <!-- listing-grid code  -->
                    @include("client.base.components.listing.listing-grid")

                </div><!--en grid-->

                <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                    <div class="md:col-span-12 text-center">
                        <nav>
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                        <i class="uil uil-angle-left text-[20px]"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">2</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page"
                                        class="z-10 size-10 inline-flex justify-center items-center mx-1 rounded-full text-white bg-green-600 shadow-sm dark:shadow-gray-700">3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">4</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                        <i class="uil uil-angle-right text-[20px]"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end grid-->
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
@endsection
