@php
$pricings = [
    [
        'icon' => 'uil uil-trees',
        'title' => 'Basique',
        'number' => "19",
        'btn' => "Commencer",
    ],
    [
        'icon' => 'uil uil-shield',
        'title' => 'Premium',
        'number' => "39",
        'btn' => "Commencer",
    ],
    [
        'icon' => 'uil uil-rocket',
        'title' => 'Business',
        'number' => "99",
        'btn' => "Commencer",
    ],
];
@endphp

@foreach ($pricings as $item)
<!-- Contenu -->
<div class="rounded-md shadow dark:shadow-gray-700 hover:shadow-md dark:hover:shadow-gray-700 duration-500 ease-in-out">
    <div class="border-b dark:border-gray-800 p-6 text-center">
        <div class="size-24 bg-green-600/5 text-green-600 flex items-center justify-center text-3xl rounded-full mx-auto">
            <i class="{{ $item['icon'] }}"></i>
        </div>

        <h3 class="text-2xl text-green-600 font-medium mt-4">{{ $item['title'] }}</h3>

        <div class="flex justify-center mt-4">
            <span class="text-3xl font-semibold">{{ $item['number'] }}</span>
            <span class="text-xl">Fcfa</span> {{-- Ou $ selon ta devise --}}
            <span class="text-xl self-end">/mois</span>
        </div>
    </div>

    <div class="p-6">
        <h5>Caractéristiques du tarif :</h5>

        <ul class="list-none">
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="uil uil-check-circle align-middle"></i></span>Accès complet</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="uil uil-check-circle align-middle"></i></span>Fichiers sources</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="uil uil-check-circle align-middle"></i></span>Rendez-vous gratuits</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="uil uil-check-circle align-middle"></i></span>Sécurité renforcée</li>
        </ul>

        <a href="" class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-md w-full mt-4">{{ $item['btn'] }}</a>
    </div>
</div>
<!-- Contenu -->
@endforeach
