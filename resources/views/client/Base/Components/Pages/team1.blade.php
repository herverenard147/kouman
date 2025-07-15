@php

$teams = [
    [
        'img' => '/images/client/04.jpg',
        'name' => 'Jack John',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/05.jpg',
        'name' => 'Krista John',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/06.jpg',
        'name' => 'Roger Jackson',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/07.jpg',
        'name' => 'Johnny English',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/08.jpg',
        'name' => 'Clayton Dalke',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/01.jpg',
        'name' => 'Christopher Myers',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/02.jpg',
        'name' => 'Mary Petersen',
        'title' => 'Property Broker',
    ],
    [
        'img' => '/images/client/03.jpg',
        'name' => 'Amber Durden',
        'title' => 'Property Broker',
    ],
];
@endphp

@foreach ($teams as $item)
    <div class="group text-center">
        <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
            <img src="{{ asset('client/assets' . $item['img']) }}" class="" alt="">
            <div
                class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
            </div>

            <ul
                class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 transition-all duration-500 ease-in-out">
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                            data-feather="facebook" class="size-4"></i></a></li>
                <li class="inline"><a href="#"
                        class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                            data-feather="instagram" class="size-4"></i></a></li>
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                            data-feather="linkedin" class="size-4"></i></a></li>
            </ul><!--end icon-->
        </div>

        <div class="content mt-3">
            <a href="agent-profile.php"
                class="text-xl font-medium hover:text-green-600 transition-all duration-500 ease-in-out">{{ $item['name'] }}</a>
            <p class="text-slate-400">{{ $item['title'] }}</p>
        </div>
    </div>
@endforeach
