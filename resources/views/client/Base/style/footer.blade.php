<!-- Début Pied de page -->
<footer class="relative bg-slate-900 dark:bg-slate-800 mt-24">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="relative py-16">
                <!-- Abonnement -->
                <div class="relative w-full">
                    <div class="relative -top-40 bg-white dark:bg-slate-900 lg:px-8 px-6 py-10 rounded-xl shadow-lg dark:shadow-gray-700 overflow-hidden">
                        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px]">
                            <div class="md:text-start text-center z-1">
                                <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-medium text-black dark:text-white">Abonnez-vous à la newsletter !</h3>
                                <p class="text-slate-400 max-w-xl mx-auto">Inscrivez-vous pour recevoir les dernières actualités et informations.</p>
                            </div>

                            <div class="subcribe-form z-1">
                                <form class="relative max-w-lg md:ms-auto">
                                    <input type="email" id="subcribe" name="email" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700" placeholder="Entrez votre email :">
                                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">S’abonner</button>
                                </form><!-- fin formulaire -->
                            </div>
                        </div>

                        <div class="absolute -top-5 -start-5">
                            <div class="uil uil-envelope lg:text-[150px] text-7xl text-black/5 dark:text-white/5 ltr:-rotate-45 rtl:rotate-45"></div>
                        </div>

                        <div class="absolute -bottom-5 -end-5">
                            <div class="uil uil-pen lg:text-[150px] text-7xl text-black/5 dark:text-white/5 rtl:-rotate-90"></div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] -mt-24">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{ asset('client/assets/images/d.ico') }}" alt="">
                            </a>
                            <p class="mt-6 text-gray-300">Une excellente plateforme pour acheter, vendre et louer vos biens sans agent ni commission.</p>
                        </div><!-- fin colonne -->

                        <div class="lg:col-span-2 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Entreprise</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="aboutus.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> À propos</a></li>
                                <li class="mt-[10px]"><a href="features.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                                <li class="mt-[10px]"><a href="pricing.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Tarifs</a></li>
                                <li class="mt-[10px]"><a href="blog.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>
                                <li class="mt-[10px]"><a href="auth-login.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Connexion</a></li>
                            </ul>
                        </div><!-- fin colonne -->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Liens utiles</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="terms.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Conditions d'utilisation</a></li>
                                <li class="mt-[10px]"><a href="privacy.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Politique de confidentialité</a></li>
                                <li class="mt-[10px]"><a href="listing-one.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Annonces</a></li>
                                <li class="mt-[10px]"><a href="contact.php" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Contact</a></li>
                            </ul>
                        </div><!-- fin colonne -->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Coordonnées</h5>

                            <div class="flex mt-6">
                                <i data-feather="map-pin" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <h6 class="text-gray-300 mb-2">C/54 Northwest Freeway, <br> Suite 558, <br> Houston, USA 485</h6>
                                    <a href="https://www.google.com/maps/embed?pb=..." data-type="iframe" class="text-green-600 hover:text-green-700 duration-500 ease-in-out lightbox">Voir sur Google Maps</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="mail" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="mailto:contact@example.com" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">contact@example.com</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="phone" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="tel:+152534-468-854" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+152 534-468-854</a>
                                </div>
                            </div>
                        </div><!-- fin colonne -->
                    </div><!-- fin grid -->
                </div>
                <!-- Fin Abonnement -->
            </div>
        </div>
    </div><!-- fin container -->

    <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
        <div class="container relative text-center">
            <div class="grid md:grid-cols-2 items-center gap-4">
                <div class="md:text-start text-center">
                    <p class="mb-0 text-gray-300">© <script>document.write(new Date().getFullYear())</script> Afrique Évasion. Conception et développement par  par <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">Kw Legal & Tech</a>.</p>
                </div>

                <ul class="list-none md:text-end text-center">
                    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="linkedin" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="facebook" class="size-4"></i></a></li>
                    <li class="inline"><a href="mailto:support@shreethemes.in" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="mail" class="size-4"></i></a></li>
                </ul><!-- fin icônes -->
            </div><!-- fin grid -->
        </div><!-- fin container -->
    </div>
</footer>
<!-- Fin Pied de page -->
