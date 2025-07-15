@php
    $categories = [
        [
            'img' => 'images/property/residential.jpg',
            'name' => 'Residential',
            'listings' => '46 Listings',
        ],
        [
            'img' => 'images/property/land.jpg',
            'name' => 'Land',
            'listings' => '124 Listings',
        ],
        [
            'img' => 'images/property/commercial.jpg',
            'name' => 'Commercial',
            'listings' => '265 Listings',
        ],
        [
            'img' => 'images/property/industrial.jpg',
            'name' => 'Industrial',
            'listings' => '452 Listings',
        ],
        [
            'img' => 'images/property/investment.jpg',
            'name' => 'Investment',
            'listings' => '12 Listings',
        ],
    ];
@endphp

@foreach ($categories as $item)
    <div
        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
        <img src="{{ asset('client/assets/' . $item['img']) }}" alt="">
        <div class="p-4">
            <a href="" class="text-xl font-medium hover:text-green-600">{{ $item['name'] }}</a>
            <p class="text-slate-400 text-sm mt-1">{{ $item['listings'] }}</p>
        </div>
    </div>
@endforeach
