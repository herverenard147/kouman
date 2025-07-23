@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Conditions et services')
@section('content')

    <!-- Début Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{asset('client/assets/images/bg/01.jpg')}}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Conditions et services</h3>
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
    <!-- Fin Hero -->

    <!-- Début Conditions générales -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="md:flex justify-center">
                <div class="md:w-3/4">
                    <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">

                        <h5 class="text-xl font-medium mb-4">Introduction :</h5>
                        <p class="text-slate-400">
                            Bienvenue sur Afrique Évasion, votre plateforme dédiée à la connexion directe entre voyageurs et partenaires fiables à travers l’Afrique.
                            En utilisant notre service, vous acceptez nos conditions visant à garantir une expérience sécurisée, transparente et agréable pour tous.
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">Accords utilisateur :</h5>
                        <p class="text-slate-400">
                            En tant qu’utilisateur, vous vous engagez à fournir des informations exactes lors de vos réservations et à respecter les règles spécifiques des partenaires avec lesquels vous interagissez.
                            Notre plateforme facilite la mise en relation, mais chaque transaction est conclue directement entre client et partenaire, dans un cadre sécurisé.
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">Restrictions :</h5>
                        <p class="text-slate-400">Il est strictement interdit de :</p>
                        <ul class="list-none text-slate-400 mt-3">
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Utiliser la plateforme pour des activités illégales ou frauduleuses</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Partager des informations personnelles ou sensibles sans consentement</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Publier des contenus offensants, discriminatoires ou trompeurs</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Entraver le bon fonctionnement du service ou des transactions</li>
                        </ul>

                        <h5 class="text-xl font-medium mt-8">Questions & Réponses fréquentes :</h5>

                        <div id="accordion-collapse" data-accordion="collapse" class="mt-6">
                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-1">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                        aria-controls="accordion-collapse-body-1">
                                        <span>Comment réserver une offre sur Afrique Évasion ?</span>
                                        <svg data-accordion-icon class="size-5 rotate-180 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-1" class="p-5">
                                    <p class="text-slate-400 dark:text-gray-400">
                                        Choisissez votre hébergement, vol ou activité, puis réservez directement auprès du partenaire via notre plateforme sécurisée. Un email de confirmation vous sera envoyé.
                                    </p>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-2">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-2">
                                        <span>Comment devenir partenaire Afrique Évasion ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-2" class="hidden p-5"
                                    aria-labelledby="accordion-collapse-heading-2">
                                    <p class="text-slate-400 dark:text-gray-400">
                                        Inscrivez-vous via notre formulaire partenaire. Après validation, vous pourrez proposer vos offres directement à notre communauté de voyageurs africains.
                                    </p>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-3">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-3">
                                        <span>Comment sont sécurisés les paiements ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-3" class="hidden p-5"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <p class="text-slate-400 dark:text-gray-400">
                                        Notre plateforme utilise des protocoles de paiement reconnus et sécurisés garantissant la protection de vos données et de vos transactions.
                                    </p>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-4">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-4">
                                        <span>Que faire en cas de problème avec une réservation ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-4" class="hidden p-5"
                                    aria-labelledby="accordion-collapse-heading-4">
                                    <p class="text-slate-400 dark:text-gray-400">
                                        Contactez notre support client local qui vous accompagnera pour résoudre tout litige ou question liée à votre réservation.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Accepter</a>
                            <a href=""
                                class="btn bg-transparent hover:bg-green-600 border border-green-600 text-green-600 hover:text-white rounded-md ms-2">Refuser</a>
                        </div>
                    </div>
                </div><!--end -->
            </div><!--end grid-->
        </div><!--end container-->
    </section>
    <!-- Fin Conditions générales -->
@endsection
