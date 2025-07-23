<!-- Début du pied de page -->
<footer class="relative bg-slate-50 dark:bg-slate-800 border-t dark:border-gray-700 mt-24">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="relative py-16">
                <!-- Abonnement -->
                <div class="relative w-full">
                    <div class="relative -top-40 bg-black dark:bg-slate-900 lg:px-8 px-6 py-10 rounded-xl shadow-lg dark:shadow-gray-700 overflow-hidden">
                        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px]">
                            <div class="md:text-start text-center z-1">
                                <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-medium text-white">Abonnez-vous à notre newsletter !</h3>
                                <p class="text-slate-400 max-w-xl mx-auto">Recevez les dernières mises à jour et informations directement dans votre boîte mail.</p>
                            </div>

                            <div class="subcribe-form z-1">
                                <form class="relative max-w-lg md:ms-auto">
                                    <input type="email" id="subcribe" name="email" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700" placeholder="Entrez votre adresse e-mail :">
                                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">S’abonner</button>
                                </form>
                            </div>
                        </div>

                        <div class="absolute -top-5 -start-5">
                            <div class="uil uil-envelope lg:text-[150px] text-7xl text-white/5 ltr:-rotate-45 rtl:rotate-45"></div>
                        </div>

                        <div class="absolute -bottom-5 -end-5">
                            <div class="uil uil-pen lg:text-[150px] text-7xl text-white/5 rtl:-rotate-90"></div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] -mt-24">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{ asset('/client/assets/images/logoG.ico') }}" class="block dark:hidden" alt="Afrique Évasion Logo">
                                <img src="{{ asset('/client/assets/images/logoG.ico') }}" class="hidden dark:block" alt="Afrique Évasion Logo">
                            </a>
                            <p class="mt-6 text-gray-300">Découvrez, comparez et réservez hôtels, vols, excursions et résidences à travers l’Afrique. Une plateforme 100 % directe, sans commissions.</p>
                        </div>

                        <div class="lg:col-span-2 md:col-span-4">
                            <h5 class="tracking-[1px] text-black dark:text-white font-semibold">Entreprise</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="{{ route('client.aboutus') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> À propos</a></li>
                                <li class="mt-[10px]"><a href="{{ route('client.grid.sidebar') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Nos offres</a></li>
                                <li class="mt-[10px]"><a href="{{ route('client.pricing') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Tarification</a></li>
                                <li class="mt-[10px]"><a href="{{ route('client.agencies') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Partenaires</a></li>
                            </ul>
                        </div>

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-black dark:text-white font-semibold">Liens utiles</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="{{ route('client.terms') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Conditions d’utilisation</a></li>
                                <li class="mt-[10px]"><a href="{{ route('client.privacy') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Politique de confidentialité</a></li>
                                <li class="mt-[10px]"><a href="{{ route('client.contact') }}" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b me-1"></i> Contact</a></li>
                            </ul>
                        </div>

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-black dark:text-white font-semibold">Contact</h5>

                            <div class="flex mt-6">
                                <i data-feather="map-pin" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <h6 class="text-slate-400 mb-2">Côte d'Ivoire, <br> Abidjan, Immeuble Longchamp, Plateau<br> 25 BP 469 ABIDJAN 25</h6>
                                    <a href="https://www.google.com/maps/place/Immeuble+Longchamp+Du+Plateau/@5.3255037,-4.0275223,867m/data=!3m2!1e3!4b1!4m6!3m5!1s0xfc1eba100183785:0xc6e997b2eae0b484!8m2!3d5.3255037!4d-4.0226514!16s%2Fg%2F11nmf6mrgf?entry=ttu&g_ep=EgoyMDI1MDcxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-green-600 hover:text-green-700 duration-500 ease-in-out">Voir sur Google Maps</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="mail" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="mailto:contact@kwlegaltech.com" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out">contact@kwlegaltech.com</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="phone" class="size-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="tel:+2250700713501" class="text-slate-400 hover:text-slate-500 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out">+225 07 00 71 35 01</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin abonnement -->
            </div>
        </div>
    </div>

    <div class="py-[30px] px-0 border-t dark:border-gray-700">
        <div class="container relative text-center">
            <div class="grid md:grid-cols-2 items-center gap-6">
                <div class="md:text-start text-center">
                    <p class="mb-0 text-gray-300">© <script>document.write(new Date().getFullYear())</script> Afrique Évasion. Conception et développement par <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">Kw Legal & Tech</a>.</p>
                </div>

                <ul class="list-none md:text-end text-center">
                    <li class="inline"><a href="http://linkedin.com/companykw-legal-technologie" target="_blank" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="linkedin" class="size-4"></i></a></li>
                    <li class="inline"><a href="https://www.facebook.com/share/1AUB3p5Tko/?mibextid=wwXIfr" target="_blank" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="facebook" class="size-4"></i></a></li>
                    <li class="inline"><a href="mailto:contact@kwlegaltech.com" class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i data-feather="mail" class="size-4"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Fin du pied de page -->
