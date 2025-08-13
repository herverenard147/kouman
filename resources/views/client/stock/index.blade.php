@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Accueil')
@section('content')

    <!-- Start Hero -->
    <section class="swiper-slider-hero relative block h-screen" id="home">
        <div class="swiper-container absolute end-0 top-0 size-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center overflow-hidden">
                    <div class="slide-inner absolute end-0 top-0 size-full slide-bg-image flex items-center bg-center;"
                        data-background="{{ asset('client/assets/images/bg/01.jpg') }}">
                        <div class="container relative">
                            <div class="grid grid-cols-1">
                                <div class="text-center">
                                    <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">
                                        Une façon simple de trouver votre <br> propriété de rêve</h1>
                                    <p class="text-white/70 text-xl max-w-xl mx-auto">
                                        Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                                    </p>
                                    <div class="mt-6">
                                        <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Voir plus</a>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </div><!-- end slide-inner -->
                </div> <!-- end swiper-slide -->

                <div class="swiper-slide flex items-center overflow-hidden">
                    <div class="slide-inner absolute end-0 top-0 size-full slide-bg-image flex items-center bg-center;"
                        data-background="{{ asset('client/assets/images/bg/02.jpg') }}">
                        <div class="container relative">
                            <div class="grid grid-cols-1">
                                <div class="text-center">
                                    <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">
                                        Nous vous aidons à trouver <br> la maison idéale</h1>
                                    <p class="text-white/70 text-xl max-w-xl mx-auto">
                                        Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                                    </p>
                                    <div class="mt-6">
                                        <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Voir plus</a>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </div><!-- end slide-inner -->
                </div> <!-- end swiper-slide -->
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div
                class="swiper-button-next bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-green-600 hover:border-green-600 rounded-full text-center">
            </div>
            <div
                class="swiper-button-prev bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-green-600 hover:border-green-600 rounded-full text-center">
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
    <!-- Start -->
    <section class="relative md:pb-24 pb-16">
        <div class="container relative z-1">
            <div class="grid grid-cols-1 justify-center">
                <div class="relative md:-mt-52 -mt-40">
                    <div class="grid grid-cols-1">
                        <!-- Onglets -->
                        <ul class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-t-xl border-b dark:border-gray-800 mt-10"
                            id="service-tabs">
                            @foreach (['hebergement' => 'Hébergement', 'vol' => 'Vol', 'excursion' => 'Excursion', 'evenement' => 'Événement'] as $key => $label)
                                <li role="presentation" class="inline-block">
                                    <button type="button"
                                        class="tab-button sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out"
                                        data-category="{{ $key }}">
                                        {{ $label }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Formulaire de filtre -->
                        <div class="p-6 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
                            <form id="filter-form" class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-6 items-end">
                                {{-- Recherche --}}
                                <div>
                                    <label class="form-label font-medium text-slate-900 dark:text-white">Recherche : <span class="text-red-600">*</span></label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-search text-lg absolute top-3 left-3 text-green-600"></i>
                                        <input type="text" name="search" class="form-input ps-10 filter-input-box bg-gray-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-800 w-full h-12 rounded"
                                            placeholder="Entrez vos mots-clés">
                                    </div>
                                </div>

                                {{-- Type (catégorie) --}}
                                <div>
                                    <label class="form-label font-medium text-slate-900 dark:text-white">Sélectionnez la catégorie :</label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-estate text-lg absolute top-3 left-3 text-green-600"></i>
                                        <select name="type_id" id="type-selector"
                                            class="form-select ps-10 bg-gray-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-800 w-full h-12 rounded">
                                            <option value="">Choisissez un type</option>
                                            {{-- Injecté dynamiquement via JS --}}
                                        </select>
                                    </div>
                                </div>

                                {{-- Prix min --}}
                                <div>
                                    <label class="form-label font-medium text-slate-900 dark:text-white">Prix minimum :</label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-usd-circle text-lg absolute top-3 left-3 text-green-600"></i>
                                        <input type="number" name="prix_min" class="form-input ps-10 bg-gray-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-800 w-full h-12 rounded"
                                            placeholder="Prix min">
                                    </div>
                                </div>

                                {{-- Prix max --}}
                                <div>
                                    <label class="form-label font-medium text-slate-900 dark:text-white">Prix maximum :</label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-usd-circle text-lg absolute top-3 left-3 text-green-600"></i>
                                        <input type="number" name="prix_max" class="form-input ps-10 bg-gray-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-800 w-full h-12 rounded"
                                            placeholder="Prix max">
                                    </div>
                                </div>

                                {{-- Bouton --}}
                                <div class="lg:mt-6">
                                    <button type="submit"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white w-full h-12 rounded">
                                        Rechercher
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">

            <!-- control code  -->
            @include('client.base.components.home.control')

        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Comment ça marche</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">

                <!-- features code  -->
                @include('client/base/components/home/features')

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Propriétés en vedette</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] mt-8">

                <!-- properties2 code  -->
                @include('client/base/components/home/properties2', $items)

            </div><!--en grid-->

            <div class="md:flex justify-center text-center mt-6">
                <div class="md:w-full">
                    <a href="{{route('client.grid.sidebar')}}"
                        class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">Voir
                        plus de propriétés <i class="uil uil-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16 lg:pt-24 pt-16">
            <div
                class="absolute inset-0 opacity-25 dark:opacity-50 bg-[url('{{ asset('client/assets/images/map.png') }}')] bg-no-repeat bg-center bg-cover">
            </div>
            <div class="relative grid grid-cols-1 pb-8 text-center z-1">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Plus de 10 000 utilisateurs nous font confiance</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div><!--end grid-->

            <div class="relative grid md:grid-cols-3 grid-cols-1 items-center mt-8 gap-[30px] z-1">

                <!-- cta1 code  -->
                @include('client/base/components/home/cta1')

            </div>
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Rencontrez l'équipe des agents</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">

                <!-- team code  -->
                @include('client/base/components/home/team')

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Ce que disent nos clients</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div><!--end grid-->

            <div class="flex justify-center relative mt-16">
                <div class="relative lg:w-1/3 md:w-1/2 w-full">
                    <div class="absolute -top-20 md:-start-24 -start-0">
                        <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                    </div>

                    <div class="absolute bottom-28 md:-end-24 -end-0">
                        <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                    </div>

                    <div class="tiny-single-item">

                        <!-- reviews code  -->
                        @include('client/base/components/home/reviews')

                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16 pb-16">

            <!-- get-in-touch code  -->
            @include('client/base/components/home/get-in-touch')

        </div><!--end container-->

    </section><!--end section-->
    <!-- End -->
    @section('script')
        <script>
            function filterItems(type) {
                let items = document.querySelectorAll('#items-list .item');
                items.forEach(item => {
                    if(type === 'all' || item.dataset.type === type) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.tab-button');
                const typeSelector = document.getElementById('type-selector');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        tabs.forEach(btn => btn.classList.remove('bg-green-600', 'text-white'));
                        this.classList.add('bg-green-600', 'text-white');

                        let category = this.dataset.category;

                        fetch(`/api/types/${category}`)
                            .then(res => res.json())
                            .then(data => {
                                typeSelector.innerHTML = `<option value="">Choisissez un type</option>`;
                                data.forEach(type => {
                                    typeSelector.innerHTML += `<option value="${type.id}">${type.nom}</option>`;
                                });
                            });
                    });
                });

                // Sélectionner le 1er onglet automatiquement
                if (tabs.length > 0) {
                    tabs[0].click();
                }

                // Optionnel : soumission AJAX du filtre
                document.getElementById('filter-form').addEventListener('submit', function (e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    fetch('{{ route('client.filtrer.services') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    }).then(res => res.text()).then(html => {
                        document.getElementById('resultats-services').innerHTML = html;
                    });
                });
            });
        </script>
    @endsection
@endsection
