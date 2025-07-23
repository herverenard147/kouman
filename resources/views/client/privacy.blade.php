@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Politique de confidentialité')
@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{asset('client/assets/images/bg/01.jpg')}}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Politique de confidentialité</h3>
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

    <!-- Start Terms & Conditions -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="md:flex justify-center">
                <div class="md:w-3/4">
                    <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                        <h5 class="text-xl font-medium mb-4">Aperçu :</h5>
                        <p class="text-slate-400">Il semble que seuls des fragments du texte original restent dans les textes Lorem Ipsum utilisés aujourd'hui. On peut supposer qu'au fil du temps certaines lettres ont été ajoutées ou supprimées à différents endroits du texte.</p>
                        <p class="text-slate-400">Dans les années 1960, le texte est soudainement devenu connu au-delà du cercle professionnel des typographes et des maquettistes lorsqu'il a été utilisé pour les feuilles Letraset (lettres adhésives sur film transparent, populaires jusqu'aux années 1980). Des versions du texte ont ensuite été incluses dans des programmes de PAO tels que PageMaker, etc.</p>
                        <p class="text-slate-400">Il existe désormais une abondance de textes factices lisibles. Ceux-ci sont généralement utilisés lorsqu'un texte est requis uniquement pour remplir un espace. Ces alternatives aux textes classiques Lorem Ipsum sont souvent amusantes et racontent des histoires courtes, drôles ou absurdes.</p>

                        <h5 class="text-xl font-medium mb-4 mt-8">Nous utilisons vos informations pour :</h5>
                        <ul class="list-unstyled text-slate-400 mt-4">
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Solutions de marketing digital pour demain</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Notre agence marketing talentueuse et expérimentée</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Créez votre propre apparence pour correspondre à votre marque</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Solutions de marketing digital pour demain</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Notre agence marketing talentueuse et expérimentée</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Créez votre propre apparence pour correspondre à votre marque</li>
                        </ul>

                        <h5 class="text-xl font-medium mb-4 mt-8">Informations fournies volontairement :</h5>
                        <p class="text-slate-400">Dans les années 1960, le texte est soudainement devenu connu au-delà du cercle professionnel des typographes et des maquettistes lorsqu'il a été utilisé pour les feuilles Letraset (lettres adhésives sur film transparent, populaires jusqu'aux années 1980). Des versions du texte ont ensuite été incluses dans des programmes de PAO tels que PageMaker, etc.</p>

                        <div class="mt-8">
                            <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Imprimer</a>
                        </div>
                    </div>
                </div><!--end -->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Terms & Conditions -->
@endsection
