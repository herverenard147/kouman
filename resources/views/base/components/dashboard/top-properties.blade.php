<?php
$properties = [
    [
        'img' => '/images/property/1.jpg',
        'name' => "House",
        'title' => "Baton Rouge, USA",
        'percentage' => "11%",
        'style' => "flex justify-between items-center",
        'class' => "w-20 text-red-600 text-end",
        'class1' => "mdi mdi-arrow-bottom-right",
    ],
    [
        'img' => '/images/property/2.jpg',
        'name' => "House",
        'title' => "Baton Rouge, USA",
        'percentage' => "20%",
        'style' => "flex justify-between items-center mt-4",
        'class' => "w-20 text-emerald-600 text-end",
        'class1' => "mdi mdi-arrow-top-right",
    ],
    [
        'img' => '/images/property/3.jpg',
        'name' => "House",
        'title' => "Baton Rouge, USA",
        'percentage' => "24%",
        'style' => "flex justify-between items-center mt-4",
        'class' => "w-20 text-emerald-600 text-end",
        'class1' => "mdi mdi-arrow-top-right",
    ],
    [
        'img' => '/images/property/4.jpg',
        'name' => "House",
        'title' => "Baton Rouge, USA",
        'percentage' => "21%",
        'style' => "flex justify-between items-center mt-4",
        'class' => "w-20 text-emerald-600 text-end",
        'class1' => "mdi mdi-arrow-top-right",
    ],
    [
        'img' => '/images/property/5.jpg',
        'name' => "House",
        'title' => "Baton Rouge, USA",
        'percentage' => "45%",
        'style' => "flex justify-between items-center mt-4",
        'class' => "w-20 text-emerald-600 text-end",
        'class1' => "mdi mdi-arrow-top-right",
    ]
];
?>
@foreach ($properties as $item)
    <div class="{{$item['style']}}">
        <div class="flex items-center">
            <div class="relative md:shrink-0">
                <img src="{{ asset($item['img']) }}" class="object-cover size-14 min-w-[56px] rounded-md shadow" alt="">
            </div>

            <div class="ms-2">
                <a href="" class="font-medium hover:text-green-600 block text-lg">{{$item['name']}}</a>
                <span class="text-slate-400">{{$item['title']}}</span>
            </div>
        </div>

        <span class="$item['class']"><i class="{{$item['class1']}}"></i> {{$item['percentage']}}</span>
    </div>
@endforeach
