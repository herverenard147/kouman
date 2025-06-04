<?php
$sites = [
    [
        'img' => '/images/property/6.jpg',
        'title' => '10 Things You About Real Estate',
        'date' => '2nd March 2025',
    ],
    [
        'img' => '/images/property/7.jpg',
        'title' => 'Why We Love Real Estate',
        'date' => '2nd March 2025',
    ],
    [
        'img' => '/images/property/8.jpg',
        'title' => '110 Quick Tips About Real Estate',
        'date' => '2nd March 2025',
    ]
];
?>
@foreach ($sites as $item)
    <div class="flex items-center mt-4">
        <img src="{{ asset($item['img']) }}" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

        <div class="ms-3">
            <a href="" class="font-medium hover:text-green-600"><?php echo $item['title']; ?></a>
            <p class="text-sm text-slate-400"><?php echo $item['date']; ?></p>
        </div>
    </div>
@endforeach
