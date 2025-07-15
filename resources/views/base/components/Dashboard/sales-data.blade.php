<?php
$datas = [
    [
        'title' => 'Via Website',
        'percentage' => "50%",
        'width' => "50%",
    ],
    [
        'title' => 'Via Team Member',
        'percentage' => "12%",
        'width' => "12%",
    ],
    [
        'title' => 'Via Agents',
        'percentage' => "6%",
        'width' => "6%",
    ],
    [
        'title' => 'Via Social Media',
        'percentage' => "15%",
        'width' => "15%",
    ],
    [
        'title' => 'Via Digital Marketing',
        'percentage' => "12%",
        'width' => "12%",
    ],
    [
        'title' => 'Via Others',
        'percentage' => "5%",
        'width' => "5%",
    ]
];
?>
@foreach ($datas as $item)
    <div class="mt-5 first:mt-0">
        <div class="flex justify-between mb-2">
            <span class="text-slate-400">{{$item['title']}}</span>
            <span class="text-slate-400">{{$item['percentage']}}</span>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-[6px]">
            <div class="bg-green-600 h-[6px] rounded-full" style="width: {{$item['width']}}"></div>
        </div>
    </div>
@endforeach
