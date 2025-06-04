<?php
$properties = [
    [
        'id' => 1,
        'img' => '/images/property/1.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '10765 Hillshire Ave, Baton Rouge, LA 70810, USA',
    ],
    [
        'id' => 2,
        'img' => '/images/property/2.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '59345 STONEWALL DR, Plaquemine, LA 70764, USA',
    ],
    [
        'id' => 3,
        'img' => '/images/property/3.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '3723 SANDBAR DR, Addis, LA 70710, USA',
    ],
    [
        'id' => 4,
        'img' => '/images/property/4.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => 'Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA',
    ],
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
    ]
];
?>

<?php foreach ($properties as $item): ?>
<div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
    <div class="relative">
        <!-- <img src="<?php
        // echo $static_url, $item['img']; ?>" alt=""> -->
        <img src="{{ asset($item['img']) }}" alt="">

        <div class="absolute top-4 end-4">
            <a href="javascript:void(0)" class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i class="mdi mdi-heart text-[20px]"></i></a>
        </div>
    </div>

    <div class="p-6">
        <div class="pb-6">
            <a href="property-detail.php?id=<?php echo $item['id']; ?>" class="text-lg hover:text-green-600 font-medium ease-in-out duration-500"><?php echo $item['title']; ?></a>
        </div>

        <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
            <li class="flex items-center me-4">
                <i class="mdi mdi-arrow-expand-all text-2xl me-2 text-green-600"></i>
                <span><?php echo $item['sqf']; ?></span>
            </li>

            <li class="flex items-center me-4">
                <i class="mdi mdi-bed text-2xl me-2 text-green-600"></i>
                <span><?php echo $item['beds']; ?></span>
            </li>

            <li class="flex items-center">
                <i class="mdi mdi-shower text-2xl me-2 text-green-600"></i>
                <span><?php echo $item['baths']; ?></span>
            </li>
        </ul>

        <ul class="pt-6 flex justify-between items-center list-none">
            <li>
                <span class="text-slate-400">Price</span>
                <p class="text-lg font-medium"><?php echo $item['price']; ?></p>
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
</div><!--end property content-->
<?php endforeach; ?>
