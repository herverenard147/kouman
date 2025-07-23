<div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
    {{-- Image avec bouton vidéo --}}
    <div class="md:col-span-5">
        <div class="relative">
            <img src="{{ asset('client/assets/images/about.jpg') }}" class="rounded-xl shadow-md" alt="Vidéo de présentation">
            <div class="absolute bottom-2/4 translate-y-2/4 start-0 end-0 text-center">
                <a href="#!" data-type="youtube" data-id="yba7hPeTSjk"
                    class="lightbox size-20 rounded-full shadow-md dark:shadow-gray-700 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-green-600">
                    <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Texte de présentation --}}
    <div class="md:col-span-7">
        <div class="lg:ms-4">
            <h4 class="mb-6 md:text-3xl text-2xl lg:leading-normal leading-normal font-semibold">
                Connecter l’Afrique. <br> Simplifier les voyages.
            </h4>
            <p class="text-slate-400 max-w-xl">
                Chez <strong>Afrique Évasion</strong>, nous mettons les voyageurs en lien direct avec des partenaires de confiance : hôtels, résidences, agences de voyage, compagnies aériennes… Grâce à notre plateforme, vous explorez, réservez et comparez en toute transparence, sans intermédiaire.
                <br><br>
                Notre mission : rendre les voyages plus accessibles, plus humains et plus adaptés aux réalités africaines.
            </p>

            <div class="mt-4">
                <a href="#" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</div>
