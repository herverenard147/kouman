@php
    $page = 'light';
    $fpage = 'foot';
@endphp
@extends('client.base.style.base')
@section('title', 'Profil de l’agent')

@section('content')
    <!-- Début -->
    <section class="relative md:py-24 pt-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="p-6 rounded-md bg-green-600/10 dark:bg-green-600/20">
                    <div class="md:flex items-center">
                        <img src="client/assets/images/client/03.jpg" class="rounded-full size-28" alt="">

                        <div class="md:ms-4 md:mt-0 mt-4 md:flex justify-between items-end">
                            <div>
                                <h5 class="text-2xl font-medium">Amber Durden <span
                                        class="text-base md:inline block md:mt-0 mt-2"><span class="text-slate-400"><span
                                                class="mdi mdi-circle-medium align-middle md:inline-block hidden"></span>
                                            Courtier</span> chez <a href="agency-profile.php"
                                            class="hover:text-green-600">Highrises Realty</a></span></h5>

                                <ul class="list-none mt-2 md:flex items-center md:divide-x-[1px] divide-slate-400">
                                    <li class="md:inline-flex flex">
                                        <ul class="text-amber-400 list-none">
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline text-black dark:text-white">4.84 (30)</li>
                                        </ul>
                                    </li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                        <i data-feather="phone" class="size-4 align-middle text-green-600 me-2"></i>
                                        +(458) 456-7854
                                    </li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                        <ul class="list-none">
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="facebook" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="instagram" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="twitter" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="linkedin" class="size-4"></i></a></li>
                                        </ul><!--end icon-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--fin grid-->
        </div><!--fin container-->

        <div class="container relative mt-6">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-5 order-1 md:order-1">
                    <div class="p-6 rounded shadow dark:shadow-gray-700 sticky top-20">
                        <h5 class="text-xl font-medium mb-4">Contactez-moi</h5>

                        <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="grid grid-cols-1 gap-3">
                                <div>
                                    <label for="name" class="font-medium">Votre nom :</label>
                                    <input name="name" id="name" type="text" class="form-input mt-2"
                                        placeholder="Nom :">
                                </div>

                                <div>
                                    <label for="email" class="font-medium">Votre email :</label>
                                    <input name="email" id="email" type="email" class="form-input mt-2"
                                        placeholder="Email :">
                                </div>

                                <div>
                                    <label for="subject" class="font-medium">Votre question :</label>
                                    <input name="subject" id="subject" class="form-input mt-2" placeholder="Objet :">
                                </div>

                                <div>
                                    <label for="comments" class="font-medium">Votre message :</label>
                                    <textarea name="comments" id="comments" class="form-input mt-2 textarea" placeholder="Message :"></textarea>
                                </div>

                                <button type="submit" id="submit" name="send"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Envoyer le message</button>
                            </div>
                        </form>
                    </div>
                </div><!--fin col-->

                <div class="lg:col-span-8 md:col-span-7 order-1 md:order-2">
                    <h5 class="text-xl font-medium">À propos de moi</h5>

                    <p class="text-slate-400 mt-3">Je suis bien évidemment courtier immobilier, avec plus de 3 ans d’expérience dans le domaine. J’ai l’habitude de gérer toutes les étapes du cycle de vente ou de location pour des biens dynamiques. Contrairement à une mise en page classique avec des textes de remplissage, j’apporte du contenu clair et professionnel.</p>
                    <p class="text-slate-400 mt-3">Les structures de données et les algorithmes sont le cœur de la programmation. Au départ, beaucoup de développeurs n’en voient pas l’utilité, mais lorsqu’on commence une carrière en développement logiciel, on réalise à quel point ils optimisent le temps d’exécution et l’espace mémoire.</p>

                    <h5 class="text-xl font-medium mt-6">Mes annonces</h5>

                    <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
                        <!-- Code profil -->
                        @include('client.base.components.pages.profile')
                    </div><!--fin grid-->

                    <div class="md:flex justify-center text-center mt-6">
                        <div class="md:w-full">
                            <a href="{{ route('client.grid') }}"
                                class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">
                                Voir plus de propriétés <i class="uil uil-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div><!--fin col-->
            </div><!--fin grid-->
        </div><!--fin container-->
    </section>
    <!-- Fin -->
@endsection
