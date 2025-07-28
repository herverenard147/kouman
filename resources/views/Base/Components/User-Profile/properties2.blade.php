<?php
$properties = [
    [
        'id' => 1,
        'img' => '/images/property/1.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '10765 Hillshire Ave, Baton Rouge, LA 70810, USA',
    ],
    [
        'id' => 2,
        'img' => '/images/property/2.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '59345 STONEWALL DR, Plaquemine, LA 70764, USA',
    ],
    [
        'id' => 3,
        'img' => '/images/property/3.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '3723 SANDBAR DR, Addis, LA 70710, USA',
    ],
    [
        'id' => 4,
        'img' => '/images/property/4.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => 'Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA',
    ],
    [
        'id' => 5,
        'img' => '/images/property/5.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA',
    ],
    [
        'id' => 6,
        'img' => '/images/property/6.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '5133 MCLAIN WAY, Baton Rouge, LA 70809, USA',
    ]
];
?>
@foreach ($properties as $item)
<div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl overflow-hidden transition duration-500">
    <div class="relative">
        <img src="{{ asset($item['img']) }}" alt="Image propriété" class="w-full h-64 object-cover">

        <div class="absolute top-4 right-4">
            <a href="javascript:void(0)" class="btn btn-icon bg-white dark:bg-slate-800 shadow rounded-full text-slate-700 dark:text-slate-200 hover:text-red-600 transition duration-300">
                <i class="mdi mdi-heart text-[20px]"></i>
            </a>
        </div>
    </div>

    <div class="p-6">
        <div class="mb-4">
            <a href="{{ route('partenaire.hebergement-detail.show', ['id' => $item['id']]) }}"
               class="text-lg font-semibold text-slate-800 dark:text-white hover:text-green-600 dark:hover:text-green-400 transition">
                {{ $item['title'] }}
            </a>
        </div>

        <ul class="flex flex-wrap items-center border-y border-slate-100 dark:border-slate-700 py-4 text-sm text-slate-600 dark:text-slate-300">
            <li class="flex items-center me-6 mb-2">
                <i class="mdi mdi-arrow-expand-all text-xl me-2 text-green-600"></i>
                {{ $item['sqf'] }}
            </li>
            <li class="flex items-center me-6 mb-2">
                <i class="mdi mdi-bed text-xl me-2 text-green-600"></i>
                {{ $item['beds'] }}
            </li>
            <li class="flex items-center mb-2">
                <i class="mdi mdi-shower text-xl me-2 text-green-600"></i>
                {{ $item['baths'] }}
            </li>
        </ul>

        <div class="pt-4 flex justify-between items-center">
            <div>
                <span class="text-slate-400 dark:text-slate-500 block text-sm">Prix</span>
                <span class="text-lg font-semibold text-slate-800 dark:text-white">{{ $item['price'] }}</span>
            </div>

            <div class="text-right">
                <span class="text-slate-400 dark:text-slate-500 block text-sm">Note</span>
                <div class="flex items-center space-x-1 text-amber-400 text-base">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="mdi mdi-star"></i>
                    @endfor
                    <span class="text-sm text-black dark:text-white">(5.0 / 30)</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
