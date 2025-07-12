<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-dark.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page= 'dark';
$fpage= 'foot';

// Optionally define the Hero block content
ob_start();
?>

        <!-- Hero Start -->
        <section class="relative py-40 lg:h-screen flex justify-center items-center bg-green-600/10">
            <div class="container relative">
                <div class="grid md:grid-cols-2 gap-[30px] mt-10 items-center">
                    <div class="md:text-start text-center">
                        <h1 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Find Your <span class="text-green-600">Perfect <br> & Wonderful</span> Home</h1>
                        <p class="text-slate-400 text-xl max-w-xl">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>

                        <div class="relative mt-8">
                            <div class="grid grid-cols-1">
                                <ul class="inline-block sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 rounded-t-xl shadow dark:shadow-gray-700" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                                    <li role="presentation" class="inline-block">
                                        <button class="px-6 py-2 text-base font-medium rounded-full w-full hover:text-green-600 transition-all duration-500 ease-in-out" id="buy-home-tab" data-tabs-target="#buy-home" type="button" role="tab" aria-controls="buy-home" aria-selected="true">Buy</button>
                                    </li>
                                    <li role="presentation" class="inline-block">
                                        <button class="px-6 py-2 text-base font-medium rounded-full w-full transition-all duration-500 ease-in-out" id="sell-home-tab" data-tabs-target="#sell-home" type="button" role="tab" aria-controls="sell-home" aria-selected="false">Sell</button>
                                    </li>
                                    <li role="presentation" class="inline-block">
                                        <button class="px-6 py-2 text-base font-medium rounded-full w-full transition-all duration-500 ease-in-out" id="rent-home-tab" data-tabs-target="#rent-home" type="button" role="tab" aria-controls="rent-home" aria-selected="false">Rent</button>
                                    </li>
                                </ul>
    
                                <div id="StarterContent" class="p-6 bg-white dark:bg-slate-900 rounded-ss-none rounded-se-none md:rounded-se-xl rounded-xl shadow dark:shadow-gray-700">
                                    <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                                        <div class="subcribe-form z-1">
                                            <form class="relative max-w-2xl mx-auto">
                                                <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                                                <input type="name" id="search_name" name="name" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12" placeholder="City, Address, Zip :">
                                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">Find Out</button>
                                            </form><!--end form-->
                                        </div>
                                    </div>
    
                                    <div class="hidden" id="sell-home" role="tabpanel" aria-labelledby="sell-home-tab">
                                        <div class="subcribe-form z-1">
                                            <form class="relative max-w-2xl mx-auto">
                                                <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                                                <input type="name" id="search_name" name="name" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12" placeholder="City, Address, Zip :">
                                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">Find Out</button>
                                            </form><!--end form-->
                                        </div>
                                    </div>
    
                                    <div class="hidden" id="rent-home" role="tabpanel" aria-labelledby="rent-home-tab">
                                        <div class="subcribe-form z-1">
                                            <form class="relative max-w-2xl mx-auto">
                                                <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                                                <input type="name" id="search_name" name="name" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12" placeholder="City, Address, Zip :">
                                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">Find Out</button>
                                            </form><!--end form-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div>
                    </div>

                    <div class="relative lg:ms-10">
                        <div class="p-5 shadow dark:shadow-gray-700 rounded-t-full bg-white dark:bg-slate-900">
                            <img src="<?php echo $static_url; ?>/images/hero.jpg" class="shadow-md rounded-t-full rounded-md" alt="">
                        </div>
                        <div class="absolute bottom-2/4 translate-y-2/4 start-0 end-0 text-center">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="lightbox size-20 rounded-full shadow-md dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-green-600">
                                <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--end Container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                
                <!-- control code  -->
                <?php
                    include "$base_dir/Components/Home/control.php";
                ?>

            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">How It Works</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    
                    <!-- features code  -->
                    <?php
                        include "$base_dir/Components/Home/features.php";
                    ?>

                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured Properties</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    
                    <!-- properties code  -->
                    <?php
                        include "$base_dir/Components/Home/properties.php";
                    ?>

                </div><!--en grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say ?</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="flex justify-center relative mt-16">
                    <div class="relative lg:w-1/3 md:w-1/2 w-full">
                        <div class="absolute -top-20 md:-start-24 -start-0">
                            <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                        </div>

                        <div class="absolute bottom-28 md:-end-24 -end-0">
                            <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                        </div>

                        <div class="tiny-single-item">
                            
                            <!-- reviews code  -->
                            <?php
                                include "$base_dir/Components/Home/reviews.php";
                            ?>

                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                
                <!-- get-in-touch code  -->
                <?php
                    include "$base_dir/Components/Home/get-in-touch.php";
                ?>

            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
include "$base_dir/style/base.php";
?>

        <script>
            easy_background("#home",
                {
                    slide: ["<?php echo $static_url; ?>/images/bg/01.jpg", "<?php echo $static_url; ?>/images/bg/02.jpg", "<?php echo $static_url; ?>/images/bg/03.jpg"],
                    delay: [4000, 4000, 4000]
                }
            );
        </script>