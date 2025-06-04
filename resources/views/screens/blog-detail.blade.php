<?php
// Include the common navlink content
ob_start();
$navlink_content = ob_get_clean(); // Capture the navlink content

// Optionally define the Hero block content
ob_start();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

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
    ]
];

$article = null;
if ($id === 0) {
    $article = $blogs; // Use all articles when no ID is provided

} else {
    // Search for the article by ID
    foreach ($blogs as $item) {
        if ($item['id'] === $id) {
            $article = $item;
            break;
        }
    }
}

if ($article === null) {
    echo "Article not found.";
    exit;
}
?>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">
                <?php
                    if (!empty($article['title'])) {
                        // If article['title'] exists, display it
                            echo $article['title'];
                    } else {
                        // If article['title'] does not exist, display this
                        echo 'Skills That You Can Learn In The Real Estate Market';
                    }
                ?>
                </h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-green-600 dark:hover:text-white"><a href="{{route('index')}}">Hously</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600 dark:text-white" aria-current="page">Blog Detail</li>
                </ul>
            </div>

            <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-6 mt-6">
                <div class="lg:col-span-8 md:order-1 order-2">
                    <div class="relative overflow-hidden bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-700">

                        <img src=" @if (!empty($article['img']))
                            {{asset($article['img'])}}
                        @else
                            {{asset('/images/property/9.jpg')}}
                        @endif" alt="">
                        <div class="p-6">
                            <p class="text-slate-400">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words. This ancient dummy text is also incomprehensible, but it imitates the rhythm of most European languages in Latin script.</p>
                            <p class="text-slate-400 italic border-x-4 border-green-600 rounded-ss-xl rounded-ee-xl mt-3 p-3">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. "</p>
                            <p class="text-slate-400 mt-3">The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout.</p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-slate-900 rounded-md p-6 shadow dark:shadow-gray-700 mt-6">
                        <h5 class="text-lg font-semibold">Leave A Comment:</h5>

                        <form class="mt-8">
                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="name" class="font-semibold">Your Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                            <input name="name" id="name" type="text" class="form-input ps-11" placeholder="Name :">
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">Your Email:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <input name="email" id="email" type="email" class="form-input ps-11" placeholder="Email :">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="comments" class="font-semibold">Your Comment:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="message-circle" class="size-4 absolute top-3 start-4"></i>
                                            <textarea name="comments" id="comments" class="form-input ps-11 h-28" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full">Send Message</button>
                        </form>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-4 md:order-2 order-1">
                    <div class="bg-white dark:bg-slate-900 rounded-md p-6 shadow dark:shadow-gray-700">
                        <form>
                            <div>
                                <label for="searchname" class="font-medium text-lg">Search Properties</label>
                                <div class="relative mt-2">
                                    <i class="mdi mdi-magnify text-lg absolute top-[6px] start-3"></i>
                                    <input name="search" id="searchname" type="text" class="form-input border border-slate-100 dark:border-slate-800 ps-10" placeholder="Search">
                                </div>
                            </div>
                        </form>

                        <h5 class="font-medium text-lg mt-[30px]">Recent post</h5>

                            <!-- social-sites code  -->
                            @extends('Base.Components.Blog.social-sites')

                        <h5 class="font-medium text-lg mt-[30px]">Social sites</h5>
                        <ul class="list-none mt-4">
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="facebook" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="instagram" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="twitter" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="linkedin" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="github" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="youtube" class="size-4"></i></a></li>
                            <li class="inline"><a href="" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600"><i data-feather="gitlab" class="size-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
            <!-- End Content -->
        </div>
    </div><!--end container-->
@extends('Layout.base')
