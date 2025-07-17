@php
$features = [
    [
        'icon' => 'uil uil-estate',
        'title' => 'Évaluer le bien',
        'desc' => "Si la répartition des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa compréhension.",
    ],
    [
        'icon' => 'uil uil-bag',
        'title' => 'Rencontre avec un agent',
        'desc' => "Si la répartition des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa compréhension.",
    ],
    [
        'icon' => 'uil uil-key-skeleton',
        'title' => 'Finaliser l’accord',
        'desc' => "Si la répartition des lettres et des 'mots' est aléatoire, le lecteur ne sera pas distrait dans sa compréhension.",
    ]
];
@endphp

@foreach ($features as $item)
<!-- Contenu -->
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
