<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-dark.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page = 'dark';
$fpage = 'foot';

// Optionally define the Hero block content
ob_start();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

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
    ],
    [
        'id' => 7,
        'img' => '/images/property/7.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '2141 Fiero Street, Baton Rouge, LA 70808',
    ],
    [
        'id' => 8,
        'img' => '/images/property/8.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '9714 Inniswold Estates Ave, Baton Rouge, LA 70809',
    ],
    [
        'id' => 9,
        'img' => '/images/property/9.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1433 Beckenham Dr, Baton Rouge, LA 70808, USA',
    ],
    [
        'id' => 10,
        'img' => '/images/property/10.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1574 Sharlo Ave, Baton Rouge, LA 70820, USA',
    ],
    [
        'id' => 11,
        'img' => '/images/property/11.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA',
    ],
    [
        'id' => 12,
        'img' => '/images/property/12.jpg',
        'sqf' => '8000sqf',
        'beds' => '4 Beds',
        'baths' => '4 Baths',
        'price' => '$5000',
        'title' => '1533 NICHOLSON DR, Baton Rouge, LA 70802, USA',
    ],
];

$article = null;
if ($id === 0) {
    $article = $properties; // Use all articles when no ID is provided
} else {
    // Search for the article by ID
    foreach ($properties as $item) {
        if ($item['id'] === $id) {
            $article = $item;
            break;
        }
    }
}

if ($article === null) {
    echo 'Article not found.';
    exit();
}
?>

<!-- Hero Start -->
<section class="relative md:pb-24 pb-16 mt-20">
    <div class="container-fluid">
        <div class="md:flex mt-4">
            <div class="lg:w-1/2 md:w-1/2 p-1">
                <div class="group relative overflow-hidden">
                    <img src="<?php echo !empty($article['img']) ? $static_url . $article['img'] : $static_url . '/images/property/single/1.jpg'; ?>" alt="" class="w-full h-full">
                    <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                        <a href="<?php echo !empty($article['img']) ? $static_url . $article['img'] : $static_url . '/images/property/single/1.jpg'; ?>"
                            class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                class="uil uil-camera"></i></a>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/2 md:w-1/2">
                <div class="flex">
                    <div class="w-1/2 p-1">
                        <div class="group relative overflow-hidden">
                            <img src="<?php echo $static_url; ?>/images/property/single/2.jpg" alt="">
                            <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                            <div
                                class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                <a href="<?php echo $static_url; ?>/images/property/single/2.jpg"
                                    class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                        class="uil uil-camera"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2 p-1">
                        <div class="group relative overflow-hidden">
                            <img src="<?php echo $static_url; ?>/images/property/single/3.jpg" alt="">
                            <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                            <div
                                class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                <a href="<?php echo $static_url; ?>/images/property/single/3.jpg"
                                    class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                        class="uil uil-camera"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/2 p-1">
                        <div class="group relative overflow-hidden">
                            <img src="<?php echo $static_url; ?>/images/property/single/4.jpg" alt="">
                            <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                            <div
                                class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                <a href="<?php echo $static_url; ?>/images/property/single/4.jpg"
                                    class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                        class="uil uil-camera"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2 p-1">
                        <div class="group relative overflow-hidden">
                            <img src="<?php echo $static_url; ?>/images/property/single/5.jpg" alt="">
                            <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                            <div
                                class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                <a href="<?php echo $static_url; ?>/images/property/single/5.jpg"
                                    class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                        class="uil uil-camera"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end flex-->
    </div><!--end container fluid-->

    <div class="container md:mt-24 mt-16">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-7">
                <h4 class="text-2xl font-medium">
                    <?php
                    if (!empty($article['title'])) {
                        // If article['title'] exists, display it
                        echo $article['title'];
                    } else {
                        // If article['title'] does not exist, display this
                        echo '10765 Hillshire Ave, Baton Rouge, LA 70810, USA';
                    }
                    ?>
                </h4>

                <ul class="py-6 flex items-center list-none">
                    <li class="flex items-center lg:me-6 me-4">
                        <i class="uil uil-compress-arrows lg:text-3xl text-2xl me-2 text-green-600"></i>
                        <span class="lg:text-xl">
                            <?php
                            if (!empty($article['sqf'])) {
                                // If article['sqf'] exists, display it
                                echo $article['sqf'];
                            } else {
                                // If article['sqf'] does not exist, display this
                                echo '8000sqf';
                            }
                            ?>
                        </span>
                    </li>

                    <li class="flex items-center lg:me-6 me-4">
                        <i class="uil uil-bed-double lg:text-3xl text-2xl me-2 text-green-600"></i>
                        <span class="lg:text-xl">
                            <?php
                            if (!empty($article['beds'])) {
                                // If article['beds'] exists, display it
                                echo $article['beds'];
                            } else {
                                // If article['beds'] does not exist, display this
                                echo '4 Beds';
                            }
                            ?>
                        </span>
                    </li>

                    <li class="flex items-center">
                        <i class="uil uil-bath lg:text-3xl text-2xl me-2 text-green-600"></i>
                        <span class="lg:text-xl">
                            <?php
                            if (!empty($article['baths'])) {
                                // If article['baths'] exists, display it
                                echo $article['baths'];
                            } else {
                                // If article['baths'] does not exist, display this
                                echo '4 Baths';
                            }
                            ?>
                        </span>
                    </li>
                </ul>

                <p class="text-slate-400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                    aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                    nesciunt.</p>
                <p class="text-slate-400 mt-4">But I must explain to you how all this mistaken idea of denouncing
                    pleasure and praising pain was born and I will give you a complete account of the system, and
                    expound the actual teachings of the great explorer of the truth, the master-builder of human
                    happiness.</p>
                <p class="text-slate-400 mt-4">Nor again is there anyone who loves or pursues or desires to obtain pain
                    of itself, because it is pain, but because occasionally circumstances occur in which toil and pain
                    can procure him some great pleasure.</p>

                <div class="w-full leading-[0] border-0 mt-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                        style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                </div>
            </div>

            <div class="lg:col-span-4 md:col-span-5">
                <div class="sticky top-20">
                    <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                        <div class="p-6">
                            <h5 class="text-2xl font-medium">Price:</h5>

                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-medium">$ 45,231</span>

                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.75 rounded h-6">For
                                    Sale</span>
                            </div>

                            <ul class="list-none mt-4">
                                <li class="flex justify-between items-center">
                                    <span class="text-slate-400 text-sm">Days on Hously</span>
                                    <span class="font-medium text-sm">124 Days</span>
                                </li>

                                <li class="flex justify-between items-center mt-2">
                                    <span class="text-slate-400 text-sm">Price per sq ft</span>
                                    <span class="font-medium text-sm">$ 186</span>
                                </li>

                                <li class="flex justify-between items-center mt-2">
                                    <span class="text-slate-400 text-sm">Monthly Payment (estimate)</span>
                                    <span class="font-medium text-sm">$ 1497/Monthly</span>
                                </li>
                            </ul>
                        </div>

                        <div class="flex">
                            <div class="p-1 w-1/2">
                                <a href=""
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Book
                                    Now</a>
                            </div>
                            <div class="p-1 w-1/2">
                                <a href=""
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Offer
                                    Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 text-center">
                        <h3 class="mb-6 text-xl leading-normal font-medium text-black dark:text-white">Have Question ?
                            Get in touch!</h3>

                        <div class="mt-6">
                            <a href="contact.php"
                                class="btn bg-transparent hover:bg-green-600 border border-green-600 text-green-600 hover:text-white rounded-md"><i
                                    class="uil uil-phone align-middle me-2"></i> Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--end section-->
<!-- End Hero -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
include "$base_dir/style/base.php";
?>
