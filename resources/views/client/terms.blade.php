@php
    $page = 'light';
    $fpage = 'foot';
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
                        <p class="text-slate-400">Il semble que seuls des fragments du texte original subsistent dans les textes de Lorem Ipsum utilisés aujourd’hui. On peut supposer qu’au fil du temps, certaines lettres ont été ajoutées ou supprimées à différents endroits du texte.</p>

                        <h5 class="text-xl font-medium mb-4 mt-8">Accords utilisateur :</h5>
                        <p class="text-slate-400">Le texte factice le plus connu est le "Lorem Ipsum", qui serait apparu au XVIe siècle. Lorem Ipsum est <b class="text-danger-600">issu</b> d’une langue pseudo-latine qui <b class="text-danger-600">ressemble</b> plus ou moins au latin "propre". Il contient une série de mots latins réels. Ce texte ancien est également <b class="text-danger-600">incompréhensible</b>, mais il imite le rythme de la plupart des langues européennes utilisant l’alphabet latin. L’<b class="text-danger-600">avantage</b> de son origine latine et de son caractère relativement <b class="text-danger-600">insignifiant</b> est que le texte n’attire pas l’attention sur lui-même et ne détourne pas l’<b class="text-danger-600">attention</b> du lecteur de la mise en page.</p>
                        <p class="text-slate-400 mt-3">Il existe désormais une <b class="text-danger-600">abondance</b> de textes factices lisibles. Ceux-ci sont généralement utilisés lorsqu’un texte est <b class="text-danger-600">nécessaire uniquement</b> pour remplir un espace. Ces alternatives aux classiques Lorem Ipsum sont souvent amusantes et racontent des histoires courtes, drôles ou <b class="text-danger-600">insensées</b>.</p>
                        <p class="text-slate-400 mt-3">Il semble que seuls des <b class="text-danger-600">fragments</b> du texte original subsistent dans les textes de Lorem Ipsum utilisés aujourd’hui. On peut supposer qu’au fil du temps, certaines lettres ont été ajoutées ou supprimées à différents endroits du texte.</p>

                        <h5 class="text-xl font-medium mb-4 mt-8">Restrictions :</h5>
                        <p class="text-slate-400">Vous êtes expressément interdit de faire tout ce qui suit :</p>
                        <ul class="list-none text-slate-400 mt-3">
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Solutions de marketing digital pour demain</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Notre agence de marketing talentueuse et expérimentée</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Créez votre propre style pour correspondre à votre marque</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Solutions de marketing digital pour demain</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Notre agence de marketing talentueuse et expérimentée</li>
                            <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Créez votre propre style pour correspondre à votre marque</li>
                        </ul>

                        <h5 class="text-xl font-medium mt-8">Questions & Réponses des utilisateurs :</h5>

                        <div id="accordion-collapse" data-accordion="collapse" class="mt-6">
                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-1">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                        aria-controls="accordion-collapse-body-1">
                                        <span>Comment cela fonctionne-t-il ?</span>
                                        <svg data-accordion-icon class="size-5 rotate-180 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-1" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-1">
                                    <div class="p-5">
                                        <p class="text-slate-400 dark:text-gray-400">Il existe de nombreuses versions de passages de Lorem Ipsum, mais la majorité ont été modifiées sous une forme ou une autre.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-2">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-2">
                                        <span>Ai-je besoin d’un designer pour utiliser Afrique évasion ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-2" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-2">
                                    <div class="p-5">
                                        <p class="text-slate-400 dark:text-gray-400">Il existe de nombreuses versions de passages de Lorem Ipsum, mais la majorité ont été modifiées sous une forme ou une autre.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-3">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-3">
                                        <span>Que dois-je faire pour commencer à vendre ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-3" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-3">
                                    <div class="p-5">
                                        <p class="text-slate-400 dark:text-gray-400">Il existe de nombreuses versions de passages de Lorem Ipsum, mais la majorité ont été modifiées sous une forme ou une autre.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-medium" id="accordion-collapse-heading-4">
                                    <button type="button"
                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                        data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                        aria-controls="accordion-collapse-body-4">
                                        <span>Que se passe-t-il lorsque je reçois une commande ?</span>
                                        <svg data-accordion-icon class="size-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-4" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-4">
                                    <div class="p-5">
                                        <p class="text-slate-400 dark:text-gray-400">Il existe de nombreuses versions de passages de Lorem Ipsum, mais la majorité ont été modifiées sous une forme ou une autre.</p>
                                    </div>
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
