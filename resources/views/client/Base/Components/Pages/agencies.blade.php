@php
    $agencies = [
        [
            'img' => '/images/agency/1.png',
            'name' => 'Realty Zen',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/2.png',
            'name' => 'Highrises Realty',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/3.png',
            'name' => 'Avenue Realty',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/4.png',
            'name' => 'Ambrose Properties',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/5.png',
            'name' => 'Arrow Realtors',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/6.png',
            'name' => 'Aspire Brokers',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/7.png',
            'name' => 'Beachfront Properties',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/8.png',
            'name' => 'Climb Real Estate',
            'title' => 'Real Estate Agency',
        ],
        [
            'img' => '/images/agency/9.png',
            'name' => 'Dream Homes',
            'title' => 'Real Estate Agency',
        ],
    ];
@endphp

@foreach ($agencies as $item)
    <div class="group text-center">
        <div class="relative inline-block mx-auto size-64 rounded-full overflow-hidden shadow dark:shadow-gray-700">
            <img src="{{ asset('client/assets' . $item['img']) }}" class="" alt="">
        </div>

        <div class="content mt-3">
            <a href="{{ route('client.agency.profile')}}"
                class="text-xl font-medium hover:text-green-600 transition-all duration-500 ease-in-out">{{ $item['name'] }}</a>
            <p class="text-slate-400">{{ $item['title'] }}</p>
            <ul class="list-none mt-2">
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i
                            data-feather="facebook" class="size-4"></i></a></li>
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i
                            data-feather="instagram" class="size-4"></i></a></li>
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i
                            data-feather="twitter" class="size-4"></i></a></li>
                <li class="inline"><a href=""
                        class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i
                            data-feather="linkedin" class="size-4"></i></a></li>
            </ul><!--end icon-->
        </div>
    </div><!--end contant-->
@endforeach
