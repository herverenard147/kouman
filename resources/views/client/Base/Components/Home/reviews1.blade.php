@php
    $reviews = [
        [
            'img' => '/images/client/01.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' =>
                'Afrique évasion a rendu les processus si simples. Afrique évasion a instantanément augmenté le nombre d’intérêts et nous a finalement fait économiser plus de 10 000 $.',
        ],
        [
            'img' => '/images/client/02.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' =>
                'Je recommande vivement Afrique évasion comme nouvelle façon de vendre votre maison "par le propriétaire". Ma maison s’est vendue en 24 heures au prix demandé. Les 400 $ les mieux dépensés pour vendre votre maison.',
        ],
        [
            'img' => '/images/client/03.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' =>
                'Ce que j’ai préféré en vendant ma maison moi-même, c’est que nous avons pu rencontrer et connaître personnellement les gens. Cela a rendu l’expérience beaucoup plus agréable !',
        ],
        [
            'img' => '/images/client/04.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' => 'Excellente expérience globale ! Facile à utiliser et efficace.',
        ],
        [
            'img' => '/images/client/05.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' => 'Afrique évasion a rendu la vente de ma maison facile et sans stress. Ils ont dépassé les attentes.',
        ],
        [
            'img' => '/images/client/06.jpg',
            'name' => 'Christa Smith',
            'title' => 'Manager',
            'desc' => 'Afrique évasion est à un prix juste, réactif rapidement et facile à utiliser. Je recommande vivement leurs services !',
        ],
    ];
@endphp

@foreach ($reviews as $item)
    <div class="tiny-slide">
        <div class="text-center mx-3">
            <p class="text-lg text-slate-400 italic"> " {{ $item['desc'] }} " </p>

            <div class="text-center mt-5">
                <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                    <li class="inline"><i class="mdi mdi-star"></i></li>
                    <li class="inline"><i class="mdi mdi-star"></i></li>
                    <li class="inline"><i class="mdi mdi-star"></i></li>
                    <li class="inline"><i class="mdi mdi-star"></i></li>
                    <li class="inline"><i class="mdi mdi-star"></i></li>
                </ul>

                <img src="{{ asset('client/assets' . $item['img']) }}"
                    class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                <h6 class="mt-2 fw-semibold">{{ $item['name'] }}</h6>
                <span class="text-slate-400 text-sm">{{ $item['title'] }}</span>
            </div>
        </div>
    </div>
@endforeach
