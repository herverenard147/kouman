<?php
$transections = [
    [
        'img' => '/images/property/1.jpg',
        'date' => '10th Aug 2025',
        'name' => "Mr. Rocky",
        'price' => "$1245/M",
        'type' => "Rent",
        'status' => "Paid",
        'style' => "bg-emerald-600/10 dark:bg-emerald-600/20 border border-emerald-600/10 dark:border-emerald-600/20 text-emerald-600 text-[15px] font-medium px-2.5 py-0.5 rounded h-5 ms-1",
    ],
    [
        'img' => '/images/property/2.jpg',
        'date' => '10th Aug 2025',
        'name' => "Mr. Cristino",
        'price' => "$12450",
        'type' => "Sell",
        'status' => "Unpaid",
        'style' => "bg-red-600/10 dark:bg-red-600/20 border border-red-600/10 dark:border-red-600/20 text-red-600 text-[15px] font-medium px-2.5 py-0.5 rounded h-5 ms-1",
    ],
    [
        'img' => '/images/property/3.jpg',
        'date' => '10th Aug 2025',
        'name' => "Mr. Jack",
        'price' => "$12450",
        'type' => "Sell",
        'status' => "Paid",
        'style' => "bg-emerald-600/10 dark:bg-emerald-600/20 border border-emerald-600/10 dark:border-emerald-600/20 text-emerald-600 text-[15px] font-medium px-2.5 py-0.5 rounded h-5 ms-1",
    ],
    [
        'img' => '/images/property/4.jpg',
        'date' => '10th Aug 2025',
        'name' => "Ms. Cally",
        'price' => "$12450",
        'type' => "Sell",
        'status' => "Unpaid",
        'style' => "bg-red-600/10 dark:bg-red-600/20 border border-red-600/10 dark:border-red-600/20 text-red-600 text-[15px] font-medium px-2.5 py-0.5 rounded h-5 ms-1",
    ],
    [
        'img' => '/images/property/5.jpg',
        'date' => '10th Aug 2025',
        'name' => "Ms. Cristina",
        'price' => "$1245/M",
        'type' => "Rent",
        'status' => "Unpaid",
        'style' => "bg-red-600/10 dark:bg-red-600/20 border border-red-600/10 dark:border-red-600/20 text-red-600 text-[15px] font-medium px-2.5 py-0.5 rounded h-5 ms-1",
    ]
];
?>

@foreach ($transections as $item)
    <tr>
        <th class="text-start border-t border-gray-100 dark:border-gray-800 px-4 py-3 font-semibold">
            <div class="relative md:shrink-0">
                <img src="{{ asset($item['img']) }}" class="object-cover size-12 min-w-[48px] rounded-md shadow dark:shadow-gray-700" alt="">
            </div>
        </th>
        <td class="text-start border-t border-gray-100 dark:border-gray-800 px-4 py-3">
            <span class="text-slate-400">{{$item['date']}}</span>
        </td>
        <th class="text-start border-t border-gray-100 dark:border-gray-800 px-4 py-3 font-semibold">{{$item['name']}}</th>
        <td class="text-start border-t border-gray-100 dark:border-gray-800 px-4 py-3">
            <span class="text-slate-400">{{$item['price']}}</span>
        </td>
        <th class="text-start border-t border-gray-100 dark:border-gray-800 px-4 py-3 font-semibold">{{$item['type']}}</th>
        <td class="text-end border-t border-gray-100 dark:border-gray-800 px-4 py-3">
            <span class="$item['style']">{{$item['status']}}</span>
        </td>
    </tr>
@endforeach
