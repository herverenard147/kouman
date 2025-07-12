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
        <section class="relative md:pt-44 pt-36 bg-gradient-to-b from-slate-50 dark:from-slate-800 to-transparent">
            <div class="container relative">
                <div class="grid grid-cols-1">
                    <div class="text-center">
                        <h1 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Are you ready to find your dream home</h1>
                        <p class="text-slate-400 mx-auto text-xl max-w-xl">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>

                        <div class="subcribe-form relative z-1 mt-8">
                            <form class="relative max-w-2xl mx-auto">
                                <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                                <input type="name" id="search_name" name="name" class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12" placeholder="City, Address, Zip :">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">Search</button>
                            </form><!--end form-->
                        </div>
                    </div>
                    <div class="relative -mt-[25px]">
                        <img src="<?php echo $static_url; ?>/images/bg/05.jpg" class="rounded-xl shadow-md dark:shadow-gray-700" alt="">
                        <div class="absolute bottom-2/4 translate-y-2/4 start-0 end-0 text-center">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="lightbox size-20 rounded-full shadow-md dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-green-600">
                                <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>               
            </div><!--end Container-->
        </section>

        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Listing Categories</h3>

                    <p class="text-slate-400 max-w-xl">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 mt-8 md:gap-[30px] gap-3">
                    
                    <!-- categories code  -->
                    <?php
                        include "$base_dir/Components/Home/categories.php";
                    ?>

                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                
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

                <div class="grid grid-cols-1 mt-8 relative">
                    <div class="tiny-home-slide-three">
                        
                        <!-- properties1 code  -->
                        <?php
                            include "$base_dir/Components/Home/properties1.php";
                        ?>

                    </div>
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