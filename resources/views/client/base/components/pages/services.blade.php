@php
$services = [
    [
        'icon' => 'uil uil-hotel',
        'title' => 'Réservation d’hébergement',
        'desc' => 'Accédez à un large choix d’hôtels, résidences et chambres, partout en Afrique, au meilleur prix.',
    ],
    [
        'icon' => 'uil uil-plane',
        'title' => 'Comparaison de vols',
        'desc' => 'Comparez facilement les billets d’avion vers vos destinations africaines favorites pour toujours trouver la meilleure offre.',
    ],
    [
        'icon' => 'uil uil-briefcase-alt',
        'title' => 'Excursions & événements',
        'desc' => 'Découvrez des activités culturelles, excursions, événements et expériences authentiques proposées par nos partenaires locaux.',
    ],
    [
        'icon' => 'uil uil-shield-check',
        'title' => 'Paiements sécurisés',
        'desc' => 'Tous les paiements sont protégés grâce à notre plateforme sécurisée, pour une tranquillité d’esprit totale.',
    ],
    [
        'icon' => 'uil uil-users-alt',
        'title' => 'Support client africain',
        'desc' => 'Notre équipe locale vous accompagne à chaque étape pour rendre votre voyage simple et agréable.',
    ],
    [
        'icon' => 'uil uil-user-check',
        'title' => 'Inscription partenaires',
        'desc' => 'Les hôtels, agences et compagnies aériennes peuvent facilement rejoindre notre réseau et proposer leurs offres directement.',
    ],
];
@endphp

@foreach ($services as $item)
    <!-- Contenu -->
    <div
        class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden">
        <div class="relative overflow-hidden text-transparent -m-3">
            <i data-feather="hexagon" class="size-32 fill-green-600/5"></i>
            <div
                class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                <i class="{{ $item['icon'] }}"></i>
            </div>
        </div>

        <div class="mt-6">
            <a href="#" class="text-xl hover:text-green-600 font-medium">{{ $item['title'] }}</a>
            <p class="text-slate-400 mt-3">{{ $item['desc'] }}</p>
        </div>
    </div>
    <!-- Contenu -->
@endforeach
