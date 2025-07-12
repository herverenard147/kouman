<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-light.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page= 'light';
$fpage= 'foot';

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
    ],
    [
        'id' => 9,
        'img' => '/images/property/9.jpg', 
        'title' => 'Using Banner Stands To Increase Trade Show Traffic',
        'name' => 'Industrial', 
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

        <!-- Start Hero -->
        <section class="relative table w-full py-32 lg:py-36 bg-[url('../../<?php echo $static_url; ?>/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black opacity-80"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 text-center mt-10">
                    <h3 class="md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white mb-3">
                    <?php 
                        if (!empty($article['title'])) {
                            // If article['title'] exists, display it
                                echo $article['title']; 
                        } else {
                            // If article['title'] does not exist, display this
                            echo 'Skills That You Can Learn In The Real Estate Market'; 
                        }
                    ?>
                    </h3>

                    <ul class="list-none mt-6">
                        <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Author :</span> <span class="block">Calvin Carlo</span></li>
                        <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Date :</span> <span class="block">
                        <?php 
                            if (!empty($article['date'])) {
                                // If article['date'] exists, display it
                                    echo $article['date']; 
                            } else {
                                // If article['date'] does not exist, display this
                                echo '3rd March, 2024'; 
                            }
                        ?>
                        </span></li>
                        <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Time :</span> <span class="block">8 Min Read</span></li>
                    </ul>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="relative">
            <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Hero -->
        
        <!-- Start -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    <div class="lg:col-span-8 md:order-1 order-2">
                        <div class="relative overflow-hidden rounded-xl shadow dark:shadow-gray-800">

                            <img src="<?php echo !empty($article['img']) ? $static_url . $article['img'] : $static_url . '/images/property/9.jpg'; ?>" alt="">

                            <div class="p-6">
                                <p class="text-slate-400">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words. This ancient dummy text is also incomprehensible, but it imitates the rhythm of most European languages in Latin script.</p>
                                <p class="text-slate-400 italic border-x-4 border-green-600 rounded-ss-xl rounded-ee-xl mt-3 p-3">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. "</p>
                                <p class="text-slate-400 mt-3">The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout.</p>
                            </div>
                        </div>

                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                            <h5 class="text-lg font-semibold">Leave A Comment:</h5>

                            <form class="mt-8">
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="user" class="size-5 absolute top-3 start-4"></i>
                                                <input name="name" id="name" type="text" class="form-input ps-11" placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail" class="size-5 absolute top-3 start-4"></i>
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
                                                <i data-feather="message-circle" class="size-5 absolute top-3 start-4"></i>
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
                        <div class="sticky top-20">
                            <form>
                                <div>
                                    <label for="searchname" class="font-medium text-lg">Search Properties</label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-search text-lg absolute top-[8px] start-3"></i>
                                        <input name="search" id="searchname" type="text" class="form-input border border-slate-100 dark:border-slate-800 ps-10" placeholder="Search">
                                    </div>
                                </div>
                            </form>

                            <h5 class="font-medium text-lg mt-[30px]">Recent post</h5>
                            <div class="flex items-center mt-4">
                                <img src="<?php echo $static_url; ?>/images/property/6.jpg" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                                <div class="ms-3">
                                    <a href="" class="font-medium hover:text-green-600">10 Things You About Real Estate</a>
                                    <p class="text-sm text-slate-400">2nd March 2023</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center mt-4">
                                <img src="<?php echo $static_url; ?>/images/property/7.jpg" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                                <div class="ms-3">
                                    <a href="" class="font-medium hover:text-green-600">Why We Love Real Estate</a>
                                    <p class="text-sm text-slate-400">2nd March 2023</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center mt-4">
                                <img src="<?php echo $static_url; ?>/images/property/8.jpg" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                                <div class="ms-3">
                                    <a href="" class="font-medium hover:text-green-600">110 Quick Tips About Real Estate</a>
                                    <p class="text-sm text-slate-400">2nd March 2023</p>
                                </div>
                            </div>

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
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
include "$base_dir/style/base.php";
?>