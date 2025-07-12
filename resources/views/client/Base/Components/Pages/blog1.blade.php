<?php
$blogs = [
    [
        'id' => 1,
        'img' => '/images/property/1.jpg', 
        'title' => 'Skills That You Can Learn In The Real Estate Market',
        'name' => 'Residential', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 2,
        'img' => '/images/property/2.jpg', 
        'title' => 'Learn The Truth About Real Estate Industry',
        'name' => 'Land', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 3,
        'img' => '/images/property/3.jpg', 
        'title' => '10 Quick Tips About Business Development',
        'name' => 'Commercial', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 4,
        'img' => '/images/property/4.jpg', 
        'title' => '14 Common Misconceptions About Business Development',
        'name' => 'Industrial', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 5,
        'img' => '/images/property/5.jpg', 
        'title' => '10 Things Your Competitors Can Teach You About Real Estate',
        'name' => 'Investment', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 6,
        'img' => '/images/property/6.jpg', 
        'title' => 'Why We Love Real Estate',
        'name' => 'Residential', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 7,
        'img' => '/images/property/7.jpg', 
        'title' => '110 Quick Tips About Real Estate',
        'name' => 'Land', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 8,
        'img' => '/images/property/8.jpg', 
        'title' => '15 Best Blogs To Follow About Real Estate',
        'name' => 'Commercial', 
        'date' => '3rd March, 2024', 
    ],
    [
        'id' => 9,
        'img' => '/images/property/9.jpg', 
        'title' => 'Using Banner Stands To Increase Trade Show Traffic',
        'name' => 'Industrial', 
        'date' => '3rd March, 2024', 
    ]
];
?>

<?php foreach ($blogs as $item): ?>
<div class="group relative h-fit hover:-mt-[5px] overflow-hidden bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-700 transition-all duration-500">
    <div class="relative overflow-hidden">
        <img src="<?php echo $static_url, $item['img']; ?>" class="" alt="">
        <div class="absolute end-4 top-4">
            <span class="bg-green-600 text-white text-[14px] px-2.5 py-1 font-medium rounded-full h-5"><?php echo $item['name']; ?></span>
        </div>
    </div>

    <div class="relative p-6">
        <div class="">
            <div class="flex justify-between mb-4">
                <span class="text-slate-400 text-sm"><i class="uil uil-calendar-alt text-slate-900 dark:text-white me-2"></i><?php echo $item['date']; ?></span>
                <span class="text-slate-400 text-sm ms-3"><i class="uil uil-clock text-slate-900 dark:text-white me-2"></i>5 min read</span>
            </div>

            <a href="blog-detail.php?id=<?php echo $item['id']; ?>" class="title text-xl font-medium hover:text-green-600 duration-500 ease-in-out"><?php echo $item['title']; ?></a>
            
            <div class="mt-3">
                <a href="blog-detail.php?id=<?php echo $item['id']; ?>" class="btn btn-link hover:text-green-600 after:bg-green-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!--end content-->
<?php endforeach; ?>
