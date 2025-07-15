@php
    $services = [
        [
            'icon' => 'mdi mdi-cards-heart',
            'title' => 'Comfortable',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'icon' => 'mdi mdi-shield-sun',
            'title' => 'Extra Security',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'icon' => 'mdi mdi-star',
            'title' => 'Luxury',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'icon' => 'mdi mdi-currency-usd',
            'title' => 'Best Price',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'icon' => 'mdi mdi-map-marker',
            'title' => 'Stratagic Location',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
        [
            'icon' => 'mdi mdi-chart-arc',
            'title' => 'Efficient',
            'desc' =>
                "If the distribution of letters and 'words' is random, the reader will not be distracted from making.",
        ],
    ];
@endphp

@foreach ($services as $item)
    <!-- Content -->
    <div
        class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden">
        <div class="relative overflow-hidden text-transparent -m-3">
            <i data-feather="hexagon" class="size-32 fill-green-600/5"></i>
            <div
                class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                <i class="{{ $item['icon'] }}"></i>
            </div>
        </div>

        <div class="mt-6">
            <a href="#" class="text-xl hover:text-green-600 font-medium">{{ $item['title'] }}</a>
            <p class="text-slate-400 mt-3">{{ $item['desc'] }}</p>
        </div>
    </div>
    <!-- Content -->
@endforeach
