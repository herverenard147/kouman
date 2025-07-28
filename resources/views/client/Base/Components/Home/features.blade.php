@php
        $features = [
            [
                'icon' => 'uil uil-estate',
                'title' => 'Explorer les offres',
                'desc' => "Parcourez facilement les hébergements, vols, excursions et évènements proposés par nos partenaires africains.",
            ],
            [
                'icon' => 'uil uil-bag',
                'title' => 'Comparer et choisir',
                'desc' => "Consultez les prix, les services et les avis pour faire un choix éclairé, adapté à vos besoins et à votre budget.",
            ],
            [
                'icon' => 'uil uil-key-skeleton',
                'title' => 'Réserver en confiance',
                'desc' => "Réservez directement auprès du partenaire, sans intermédiaire, dans un cadre sécurisé et transparent.",
            ],
            [
                'icon' => 'uil uil-user-plus',
                'title' => 'Rejoindre notre réseau',
                'desc' => "Vous êtes un hôtel, une agence ou un prestataire ? Inscrivez-vous facilement et commencez à proposer vos services.",
            ],
            [
                'icon' => 'uil uil-headphones',
                'title' => 'Support local dédié',
                'desc' => "Notre équipe reste à votre écoute pour vous accompagner, où que vous soyez en Afrique.",
            ],
        ];
        @endphp

        {{-- Grid principale (ligne 1 - 3 éléments) --}}
@foreach ($features as $item)
<div class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
    <div class="relative overflow-hidden text-transparent -m-3">
        <i data-feather="hexagon" class="size-32 fill-green-600/5 mx-auto"></i>
        <div class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
            <i class="{{ $item['icon'] }}"></i>
        </div>
    </div>

    <div class="mt-6">
        <h5 class="text-xl font-medium">{{ $item['title'] }}</h5>
        <p class="text-slate-400 mt-3">{{ $item['desc'] }}</p>
    </div>
</div>
<!-- Fin Contenu -->
@endforeach
