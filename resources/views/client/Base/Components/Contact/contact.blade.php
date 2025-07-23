@php
$contacts = [
    [
        'icon' => 'uil uil-phone',
        'name' => 'Téléphone',
        'title' => "Notre équipe est à votre écoute pour toute demande d’assistance ou d’information.",
        'info' => '+225 07 00 71 35 01', // à adapter avec ton vrai numéro
        'lien' => 'tel:+2250700713501'
    ],
    [
        'icon' => 'uil uil-envelope',
        'name' => 'Email',
        'title' => "Une question ? Un besoin spécifique ? Écrivez-nous, nous répondons rapidement.",
        'info' => 'contact@kwlegaltech.com', // ou l'adresse mail réelle
        'lien' => 'mailto:contact@kwlegaltech.com'
    ],
    [
        'icon' => 'uil uil-map-marker',
        'name' => 'Adresse',
        'title' => "Abidjan, Côte d’Ivoire — Nous opérons dans toute l’Afrique avec des partenaires locaux.",
        'info' => 'Voir sur Google Maps',
        'lien' => 'https://www.google.com/maps/place/Immeuble+Longchamp+Du+Plateau/@5.3255037,-4.0275223,867m/data=!3m2!1e3!4b1!4m6!3m5!1s0xfc1eba100183785:0xc6e997b2eae0b484!8m2!3d5.3255037!4d-4.0226514!16s%2Fg%2F11nmf6mrgf?entry=ttu&g_ep=EgoyMDI1MDcxMy4wIKXMDSoASAFQAw%3D%3D'
    ]
];
@endphp

@foreach ($contacts as $item)
<div class="text-center px-6">
    <div class="relative overflow-hidden text-transparent -m-3">
        <i data-feather="hexagon" class="size-32 fill-green-600/5 mx-auto"></i>
        <div class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
            <i class="{{ $item['icon'] }}"></i>
        </div>
    </div>

    <div class="content mt-7">
        <h5 class="title h5 text-xl font-medium">{{ $item['name'] }}</h5>
        <p class="text-slate-400 mt-3">{{ $item['title'] }}</p>

        <div class="mt-5">
            <a href="{{ $item['lien'] }}" class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">{{ $item['info'] }}</a>
        </div>
    </div>
</div>
@endforeach
