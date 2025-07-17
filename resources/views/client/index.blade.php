@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Accueil')
@section('content')

    <!-- Début Hero -->
    <section
        class="relative table w-full py-36 md:py-44 lg:py-56 bg-[url('client/assets/images/bg/6.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container relative z-3">
            <div class="grid md:grid-cols-12 mt-10">
                <div class="lg:col-span-8 md:col-span-6">
                    <h1 class="font-semibold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6">
                        Trouvez le <br> <span class="typewrite" data-period="2000"
                            data-type='[ "logement", "villa", "bureau" ]'></span> parfait pour vous
                    </h1>
                    <p class="text-white/70 text-xl max-w-xl">
                        Une excellente plateforme pour acheter, vendre et louer vos biens sans intermédiaire ni commission.
                    </p>

                    <div class="mt-4">
                        <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Hero -->

    <div class="container relative -mt-16 z-1">
        <div class="grid grid-cols-1">
            <form class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700">
                <div class="registration-form text-dark text-start">
                    <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                        <div>
                            <label class="form-label font-medium text-slate-900 dark:text-white">
                                Rechercher : <span class="text-red-600">*</span>
                            </label>
                            <div class="filter-search-form relative filter-border mt-2">
                                <i class="uil uil-search icons"></i>
                                <input name="name" type="text" id="job-keyword"
                                    class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                    placeholder="Entrez vos mots-clés">
                            </div>
                        </div>

                        <div>
                            <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">
                                Catégorie :
                            </label>
                            <div class="filter-search-form relative filter-border mt-2">
                                <i class="uil uil-estate icons"></i>
                                <select class="form-select z-2" name="choices-catagory" id="choices-catagory-buy">
                                    <option>Maisons</option>
                                    <option>Appartements</option>
                                    <option>Bureaux</option>
                                    <option>Maisons de ville</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="buy-min-price" class="form-label font-medium text-slate-900 dark:text-white">
                                Prix min. :
                            </label>
                            <div class="filter-search-form relative filter-border mt-2">
                                <i class="uil uil-usd-circle icons"></i>
                                <select class="form-select" name="choices-min-price" id="choices-min-price-buy">
                                    <option>Prix min.</option>
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>6000</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white">
                                Prix max. :
                            </label>
                            <div class="filter-search-form relative mt-2">
                                <i class="uil uil-usd-circle icons"></i>
                                <select class="form-select" name="choices-max-price" id="choices-max-price-buy">
                                    <option>Prix max.</option>
                                    <option>500</option>
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>6000</option>
                                </select>
                            </div>
                        </div>

                        <div class="lg:mt-6">
                            <input type="submit" id="search-buy" name="search"
                                class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-[60px] lg:rounded-none rounded mt-2"
                                value="Rechercher">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Début Section -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="md:col-span-5">
                    <div class="relative">
                        <div class="p-5 shadow dark:shadow-gray-700 rounded-t-full bg-white dark:bg-slate-900">
                            <img src="client/assets/images/hero.jpg" class="shadow-md rounded-t-full rounded-md" alt="">
                        </div>
                        <div class="absolute bottom-2/4 translate-y-2/4 start-0 end-0 text-center">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk"
                                class="lightbox size-20 rounded-full shadow-md dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-green-600">
                                <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-7">
                    <div class="lg:ms-4">
                        <h4 class="mb-6 md:text-3xl text-2xl lg:leading-normal leading-normal font-semibold">
                            Efficacité. <br> Transparence. Contrôle.
                        </h4>
                        <p class="text-slate-400 max-w-xl">
                            Afrique évasion a développé une plateforme pour le marché immobilier qui permet aux acheteurs et vendeurs
                            d’effectuer des transactions par eux-mêmes. Elle offre efficacité, transparence des coûts et
                            autonomie. Afrique évasion, c’est l’immobilier réinventé.
                        </p>

                        <div class="mt-4">
                            <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Biens en vedette</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans intermédiaire ni commission.
                </p>
            </div>

            <div class="grid grid-cols-1 mt-8 relative">
                <div class="tiny-home-slide-three">
                    @include('client/base/components/home/properties1')
                </div>
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Catégories d'annonces</h3>
                <p class="text-slate-400 max-w-xl">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans intermédiaire ni commission.
                </p>
            </div>

            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 mt-8 md:gap-[30px] gap-3">
                @include('client/base/components/home/categories')
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Ce que disent nos clients</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans intermédiaire ni commission.
                </p>
            </div>

            <div class="flex justify-center relative mt-16">
                <div class="relative lg:w-1/3 md:w-1/2 w-full">
                    <div class="absolute -top-20 md:-start-24 -start-0">
                        <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                    </div>

                    <div class="absolute bottom-28 md:-end-24 -end-0">
                        <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                    </div>

                    <div class="tiny-single-item">
                        @include('client/base/components/home/reviews')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin -->
@endsection
