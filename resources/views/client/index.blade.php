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
            <div class="lg:col-span-10 md:col-span-6">
                <h1 class="font-semibold text-white text-4xl lg:text-6xl leading-tight lg:leading-tight mb-6">
                    Trouvez <br class="hidden lg:block">
                    <span class="inline-block">
                        <span class="typewrite text-primary font-bold" data-period="2000"
                            data-type='["l’hébergement", "l’excursion", "l’évènement", "le vol", "la chambre"]'></span>
                    </span>
                    parfait(e) pour vous
                </h1>
                <p class="text-white/70 text-xl max-w-xl">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans intermédiaire ni commission.
                </p>

                <div class="mt-4">
                    <a href="{{ route('client.aboutus') }}" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Hero -->

<div class="container relative -mt-16 z-1">
    <div class="grid grid-cols-1">
        <form method="GET" action="{{ route('client.grid.sidebar') }}"
            class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700">
            <div class="registration-form text-dark text-start">
                <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">

                    {{-- Rechercher --}}
                    <div>
                        <label class="form-label font-medium text-slate-900 dark:text-white">
                            Rechercher : {{--<span class="text-red-600">*</span>--}}
                        </label>
                        <div class="filter-search-form relative filter-border mt-2">
                            <i class="uil uil-search icons"></i>
                            <input name="search" type="text" id="job-keyword"
                                value="{{ request('search') }}"
                                class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                placeholder="Entrez vos mots-clés">
                        </div>
                    </div>

                    {{-- Catégorie --}}
                    <div>
                        <label for="choices-catagory-buy" class="form-label font-medium text-slate-900 dark:text-white">
                            Catégorie :
                        </label>
                        <div class="filter-search-form relative filter-border mt-2">
                            <i class="uil uil-estate icons"></i>
                            <select class="form-select z-2" name="categorie" id="choices-catagory-buy">
                                <option value="" @selected(request('categorie')==='' )>Toutes les catégories</option>
                                <option value="hebergement" @selected(request('categorie')==='hebergement' )>Hébergements</option>
                                <option value="vol" @selected(request('categorie')==='vol' )>Vols</option>
                                <option value="excursion" @selected(request('categorie')==='excursion' )>Excursions</option>
                                <option value="evenement" @selected(request('categorie')==='evenement' )>Événements</option>
                            </select>
                        </div>
                    </div>

                    {{-- Prix min. --}}
                    <div>
                        <label for="choices-min-price-buy" class="form-label font-medium text-slate-900 dark:text-white">
                            Prix min. :
                        </label>
                        <div class="filter-search-form relative filter-border mt-2">
                            <i class="uil uil-usd-circle icons"></i>
                            <select class="form-select" name="prix_min" id="choices-min-price-buy">
                                <option value="" @selected(request('prix_min')==='' )>Prix min.</option>
                                @php
                                // Ajuste les paliers selon ton besoin (CFA)
                                $minOptions = [10000, 50000, 100000, 200000, 300000, 500000, 1000000, 5000000, 10000000, 50000000, 100000000];
                                @endphp
                                @foreach($minOptions as $opt)
                                <option value="{{ $opt }}" @selected((string)request('prix_min')===(string)$opt)>
                                    {{ number_format($opt, 0, ',', ' ') }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Prix max. --}}
                    <div>
                        <label for="choices-max-price-buy" class="form-label font-medium text-slate-900 dark:text-white">
                            Prix max. :
                        </label>
                        <div class="filter-search-form relative mt-2">
                            <i class="uil uil-usd-circle icons"></i>
                            <select class="form-select" name="prix_max" id="choices-max-price-buy">
                                <option value="" @selected(request('prix_max')==='' )>Prix max.</option>
                                @php
                                $maxOptions = [50000, 100000, 200000, 300000, 500000, 1000000, 5000000, 10000000, 50000000, 100000000, 200000000];
                                @endphp
                                @foreach($maxOptions as $opt)
                                <option value="{{ $opt }}" @selected((string)request('prix_max')===(string)$opt)>
                                    {{ number_format($opt, 0, ',', ' ') }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Bouton --}}
                    <div class="lg:mt-6">
                        <input type="submit" id="search-buy"
                            class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-[62px] lg:rounded-none rounded mt-2"
                            value="Rechercher">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Début Section -->
<section class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen py-12">
    <div class="container relative pt-5">
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

            <div class="lg:col-span-7 md:col-span-6">
                <div class="lg:ms-6">
                    <h4 class="text-2xl leading-normal font-semibold mb-4">Efficacité. Transparence. Contrôle.</h4>
                    <p class="text-slate-400 max-w-xl mb-6">
                        Afrique Évasion révolutionne les voyages en Afrique en connectant directement les voyageurs avec les hébergeurs, compagnies aériennes, agences d’excursions et organisateurs d’événements. Réservez en toute liberté, sans intermédiaire ni frais cachés.
                    </p>

                    <ul class="space-y-4 mt-6">
                        <li class="flex items-start gap-3">
                            <div class="text-primary text-xl">
                                <i class="uil uil-check-circle"></i>
                            </div>
                            <span class="text-slate-500 leading-relaxed">
                                Réservez des hébergements uniques dans toute l’Afrique
                            </span>
                        </li>

                        <li class="flex items-start gap-3">
                            <div class="text-primary text-xl">
                                <i class="uil uil-check-circle"></i>
                            </div>
                            <span class="text-slate-500 leading-relaxed">
                                Comparez les meilleurs vols pour vos destinations
                            </span>
                        </li>

                        <li class="flex items-start gap-3">
                            <div class="text-primary text-xl">
                                <i class="uil uil-check-circle"></i>
                            </div>
                            <span class="text-slate-500 leading-relaxed">
                                Participez à des excursions et événements locaux authentiques
                            </span>
                        </li>

                        <li class="flex items-start gap-3">
                            <div class="text-primary text-xl">
                                <i class="uil uil-check-circle"></i>
                            </div>
                            <span class="text-slate-500 leading-relaxed">
                                Gagnez du temps et de l'argent grâce à une plateforme 100% sans commission
                            </span>
                        </li>
                    </ul>

                    <div class="mt-6">
                        <a href="{{ route('client.aboutus') }}" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div><!-- fin texte -->
        </div>
    </div>

    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Offres en vedette</h3>
            <p class="text-slate-400 max-w-xl mx-auto">
                Découvrez les meilleures offres d’hébergements, de vols et d’activités sélectionnées pour vous par nos partenaires.
            </p>
        </div>

        <div class="mt-8 relative">
            <div class="tiny-home-slide-three">
                @include('client.base.components.listing.listing-grid', ['items' => $items, 'asSlides' => true])
            </div>
        </div>

    </div>

    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Catégories de services</h3>
            <p class="text-slate-400 max-w-xl mx-auto">
                Explorez nos différentes catégories : hébergements, excursions, événements et plus encore.
            </p>
        </div>

        <!-- Grille centrée -->
        <div
            class="mt-8 md:gap-[30px] gap-3 grid justify-center
           [grid-template-columns:repeat(auto-fit,minmax(220px,220px))]">
            @foreach($categories as $cat)
            <a href="{{ route('client.grid.sidebar', ['categorie' => $cat['slug']]) }}"
                class="group relative rounded-xl overflow-hidden shadow hover:shadow-lg transition bg-white dark:bg-slate-900 w-[220px]">

                <!-- Image -->
                <div class="aspect-[4/3] relative">
                    <img
                        src="{{ $cat['image'] }}"
                        alt="{{ $cat['label'] }}"
                        class="w-full h-full object-cover opacity-95 transition duration-300 ease-out group-hover:brightness-60" />

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent
                      transition-colors duration-300 group-hover:from-black/80 group-hover:via-black/50"></div>
                </div>

                <!-- Contenu -->
                <div class="absolute inset-x-0 bottom-0 p-4 flex items-center justify-between z-10">
                    <div>
                        <div class="flex items-center gap-2">
                            <i class="{{ $cat['icon'] }} text-white text-xl"></i>
                            <span class="text-white font-semibold">{{ $cat['label'] }}</span>
                        </div>
                        <span class="text-white/90 text-sm">
                            {{ number_format($cat['count'], 0, ',', ' ') }} offre(s)
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>



    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Ce que disent nos clients</h3>
            <p class="text-slate-400 max-w-xl mx-auto">
                Nos utilisateurs partagent leurs expériences de réservation réussie, sans frais cachés ni commissions.
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