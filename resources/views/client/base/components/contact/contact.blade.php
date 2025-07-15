@php
$contacts = [
    [
        'icon' => 'uil uil-phone',
        'name' => 'Phone',
        'title' => 'The phrasal sequence of the is now so that many campaign and benefit',
        'info' => '+152 534-468-854'
    ],
    [
        'icon' => 'uil uil-envelope',
        'name' => 'Email',
        'title' => 'The phrasal sequence of the is now so that many campaign and benefit',
        'info' => 'contact@example.com'
    ],
    [
        'icon' => 'uil uil-map-marker',
        'name' => 'Location',
        'title' => 'C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485',
        'info' => 'View on Google map'
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
            <a href="tel:+152534-468-854" class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">{{ $item['info'] }}</a>
        </div>
    </div>
</div>
@endforeach
