@php
$reviews = [
    [
        'img' => 'images/client/01.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => "Hously a rendu le processus tellement simple. Nous avons eu beaucoup plus d’intérêt et économisé plus de 10 000 \$.",
    ],
    [
        'img' => 'images/client/02.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => 'Je recommande vivement Hously pour vendre votre maison entre particuliers. Ma maison a été vendue en 24 heures au prix demandé. Meilleurs 400 \$ jamais dépensés !',
    ],
    [
        'img' => 'images/client/03.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => "Ce que j’ai préféré en vendant moi-même ma maison, c’est d’avoir rencontré les acheteurs personnellement. Cela a rendu l’expérience bien plus agréable !",
    ],
    [
        'img' => 'images/client/04.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => "Super expérience du début à la fin ! Facile à utiliser et très efficace.",
    ],
    [
        'img' => 'images/client/05.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => "Hously a rendu la vente de ma maison simple et sans stress. Ils ont vraiment dépassé mes attentes.",
    ],
    [
        'img' => 'images/client/06.jpg',
        'name' => 'Christa Smith',
        'title' => "Directrice",
        'desc' => "Hously offre un tarif juste, une grande réactivité et une plateforme simple d’utilisation. Je recommande à 100 % !",
    ]
];
@endphp

@foreach ($reviews as $item)
<div class="tiny-slide">
    <div class="text-center">
        <p class="text-xl text-slate-400 italic">" {{ $item['desc'] }} "</p>

        <div class="text-center mt-5">
            <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
            </ul>

            <img src="{{ asset('client/assets/'.$item['img']) }}" class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
            <h6 class="mt-2 fw-semibold">{{ $item['name'] }}</h6>
            <span class="text-slate-400 text-sm">{{ $item['title'] }}</span>
        </div>
    </div>
</div>
@endforeach
