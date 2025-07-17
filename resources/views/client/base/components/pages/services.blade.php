@php
    $services = [
        [
            'icon' => 'mdi mdi-cards-heart',
            'title' => 'Confortable',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
        ],
        [
            'icon' => 'mdi mdi-shield-sun',
            'title' => 'Sécurité renforcée',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
        ],
        [
            'icon' => 'mdi mdi-star',
            'title' => 'Luxe',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
        ],
        [
            'icon' => 'mdi mdi-currency-usd',
            'title' => 'Meilleur prix',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
        ],
        [
            'icon' => 'mdi mdi-map-marker',
            'title' => 'Emplacement stratégique',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
        ],
        [
            'icon' => 'mdi mdi-chart-arc',
            'title' => 'Efficacité',
            'desc' =>
                "Si la distribution des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa lecture.",
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
