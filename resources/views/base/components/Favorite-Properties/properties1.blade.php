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
    ],
    [
        'id' => 7,
        'img' => '/images/property/7.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '2141 Fiero Street, Baton Rouge, LA 70808',
    ],
    [
        'id' => 8,
        'img' => '/images/property/8.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '9714 Inniswold Estates Ave, Baton Rouge, LA 70809',
    ],
    [
        'id' => 9,
        'img' => '/images/property/9.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1433 Beckenham Dr, Baton Rouge, LA 70808, USA',
    ],
    [
        'id' => 10,
        'img' => '/images/property/10.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1574 Sharlo Ave, Baton Rouge, LA 70820, USA',
    ],
    [
        'id' => 11,
        'img' => '/images/property/11.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA',
    ],
    [
        'id' => 12,
        'img' => '/images/property/12.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1533 NICHOLSON DR, Baton Rouge, LA 70802, USA',
    ]
];
?>
@foreach ($properties as $item)
    <div class="group rounded-xl bg-white shadow hover:shadow-xl overflow-hidden ease-in-out duration-500 w-full mx-auto">
        <div class="md:flex">
            <div class="relative md:shrink-0">
                <img class="h-full w-full object-cover md:w-48" src="{{ asset($item['img']) }}" alt="">
                <div class="absolute top-4 end-4">
                    <a href="javascript:void(0)" class="btn btn-icon bg-white shadow rounded-full text-slate-100 focus:text-red-600 hover:text-red-600"><i class="mdi mdi-heart text-[20px]"></i></a>
                </div>
            </div>
            <div class="p-6 w-full">
                <div class="md:pb-4 pb-6">
                    <a href="{{route('partenaire.hebergement-detail.show',['id' => $item['id']])}}" class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{$item['title']}}</a>
                </div>

                <ul class="md:py-4 py-6 border-y border-slate-100 flex items-center list-none">
                    <li class="flex items-center me-4">
                        <i class="mdi mdi-arrow-expand-all text-2xl me-2 text-green-600"></i>
                        <span>{{$item['sqf']}}</span>
                    </li>

                    <li class="flex items-center me-4">
                        <i class="mdi mdi-bed text-2xl me-2 text-green-600"></i>
                        <span>{{$item['beds']}}</span>
                    </li>

                    <li class="flex items-center">
                        <i class="mdi mdi-shower text-2xl me-2 text-green-600"></i>
                        <span>{{$item['baths']}}</span>
                    </li>
                </ul>

                <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                    <li>
                        <span class="text-slate-400">Price</span>
                        <p class="text-lg font-medium">{{$item['price']}}</p>
                    </li>

                    <li>
                        <span class="text-slate-400">Rating</span>
                        <ul class="text-lg font-medium text-amber-400 list-none">
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline text-black">5.0(30)</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
