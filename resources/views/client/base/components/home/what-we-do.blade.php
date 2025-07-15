@php
    $contents = [
        [
            'img' => 'images/rent.png',
            'title' => 'Rent a House',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'img' => 'images/buy.png',
            'title' => 'Buy a House',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'img' => 'images/sell.png',
            'title' => 'Sell a House',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
    ];
@endphp

@foreach ($contents as $item)
    <!-- Content -->
    <div
        class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
        <div class="relative overflow-hidden text-transparent -m-3">
            <i data-feather="hexagon" class="size-32 fill-green-600/5 mx-auto"></i>
            <div
                class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                <img src="{{ asset('client/assets/' . $item['img']) }}" class="size-12" alt="">
            </div>
        </div>

        <div class="mt-6">
            <a href="" class="text-xl font-medium hover:text-green-600">{{ $item['title'] }}</a>
            <p class="text-slate-400 mt-3">{{ $item['desc'] }}</p>

            <div class="mt-4">
                <a href=""
                    class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">Read
                    More <i class="uil uil-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>
    <!-- Content -->
@endforeach
