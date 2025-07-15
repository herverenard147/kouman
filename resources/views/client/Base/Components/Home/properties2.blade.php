@php
$properties = [
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
    ],
];
@endphp

@foreach ($properties as $item)
<div
    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-full mx-auto">
    <div class="md:flex">
        <div class="relative md:shrink-0">
            <img class="size-full object-cover md:w-48" src="{{ asset('client/assets/' . $item['img']) }}" alt="">
            <div class="absolute top-4 end-4">
                <a href="javascript:void(0)"
                    class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                        class="mdi mdi-heart text-[20px]"></i></a>
            </div>
        </div>
        <div class="p-6 w-full">
            <div class="md:pb-4 pb-6">
                <a href="{{ route('property-detail', ['id' => $item['id']]) }}"
                    class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{ $item['title'] }}</a>
            </div>

            <ul class="md:py-4 py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                <li class="flex items-center me-4">
                    <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                    <span>{{ $item['sqf'] }}</span>
                </li>

                <li class="flex items-center me-4">
                    <i class="uil uil-bed-double text-2xl me-2 text-green-600"></i>
                    <span>{{ $item['beds'] }}</span>
                </li>

                <li class="flex items-center">
                    <i class="uil uil-bath text-2xl me-2 text-green-600"></i>
                    <span>{{ $item['baths'] }}</span>
                </li>
            </ul>

            <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                <li>
                    <span class="text-slate-400">Price</span>
                    <p class="text-lg font-medium">{{ $item['price'] }}</p>
                </li>

                <li>
                    <span class="text-slate-400">Rating</span>
                    <ul class="text-lg font-medium text-amber-400 list-none">
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline"><i class="mdi mdi-star"></i></li>
                        <li class="inline text-black dark:text-white">5.0(30)</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endforeach
