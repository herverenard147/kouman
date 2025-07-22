 <?php
// $properties = [
//     [
//         'icon' => 'mdi mdi-currency-usd text-[28px]',
//         'title' => 'Revenu total',
//         'total' => "42205",
//         'debut' => "45890",
//         'symbol' => "$",
//     ],
//     [
//         'icon' => 'mdi mdi-account-group-outline text-[28px]',
//         'title' => "Nombre d'hébergement",
//         'total' => "$nombreH",
//         'debut' => "2456",
//         'symbol' => "",
//     ],
//     [
//         'icon' => 'mdi mdi-home-city-outline text-[28px]',
//         'title' => 'Propriétés totales',
//         'total' => "54",
//         'debut' => "358",
//         'symbol' => "",
//     ],
//     [
//         'icon' => 'mdi mdi-home-lightning-bolt-outline text-[28px]',
//         'title' => 'Propriétés à vendre',
//         'total' => "60",
//         'debut' => "243",
//         'symbol' => "",
//     ],
//     [
//         'icon' => 'mdi mdi-home-clock-outline text-[28px]',
//         'title' => 'Propriétés à louer',
//         'total' => "45",
//         'debut' => "115",
//         'symbol' => "",
//     ]
// ];
?>
@foreach ($properties as $item)
    <div class="relative overflow-hidden rounded-md shadow bg-white dark:bg-slate-800">
        <div class="p-5 flex items-center justify-between">
            <span class="me-3">
                {{-- Modifié: text-gray-700 -> text-slate-500 (ou text-gray-700) et ajout de dark:text-gray-300 --}}
                <span class="text-slate-500 dark:text-gray-300 block">{{ $item['title'] }}</span>
                <span class="flex items-center justify-between mt-1">
                    {{-- Modifié: text-black -> text-black dark:text-white --}}
                    <span class="text-2xl font-semibold text-black dark:text-white">
                        {{ $item['symbol'] }} <span class="counter-value" data-target="{{ $item['total'] }}">{{ $item['debut'] }}</span>
                    </span>
                </span>
            </span>

            {{-- Modifié: bg-gray-100 -> bg-gray-100 dark:bg-gray-700 --}}
            <span class="flex justify-center items-center rounded-md size-12 min-w-[48px] bg-gray-100 dark:bg-gray-700 shadow text-green-600">
                <i class="{{ $item['icon'] }}"></i>
            </span>
        </div>
    </div>
@endforeach
