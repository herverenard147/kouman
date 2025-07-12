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
        <section class="relative py-24">
            <div class="absolute inset-0 opacity-40 dark:opacity-[0.03] bg-[url('../../<?php echo $static_url; ?>/images/map.svg')] bg-no-repeat bg-bottom bg-cover"></div>
            <div class="container relative mt-10">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                    <div class="md:col-span-4">
                        <div class="md:text-start text-center">
                            <h1 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl">Let's Find a Home That's Perfect For You!</h1>

                            <div class="mt-4">
                                <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md md:mt-20">Learn More <i class="mdi mdi-arrow-right ms-1 align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="md:col-span-5">
                        <div class="rounded-full shadow-lg dark:shadow-gray-800 relative overflow-hidden border-8 border-white dark:border-slate-900">
                            <div class="grid grid-cols-1 relative">
                                <div class="tiny-single">
                                    <div class="tiny-slide">
                                        <img src="<?php echo $static_url; ?>/images/property/1.jpg" class="object-cover w-full lg:h-[600px] md:h-96 h-[500px]" alt="">
                                    </div>

                                    <div class="tiny-slide">
                                        <img src="<?php echo $static_url; ?>/images/property/5.jpg" class="object-cover w-full lg:h-[600px] md:h-96 h-[500px]" alt="">
                                    </div>

                                    <div class="tiny-slide">
                                        <img src="<?php echo $static_url; ?>/images/property/10.jpg" class="object-cover w-full lg:h-[600px] md:h-96 h-[500px]" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="md:col-span-3">
                        <div class="md:text-end text-center">
                            <p class="text-slate-400 text-xl max-w-xl">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>

                            <div class="mt-4">
                                <ul class="list-none relative md:mt-20">
                                    <li class="inline-block relative"><a href=""><img src="<?php echo $static_url; ?>/images/client/01.jpg" class="size-12 rounded-full shadow-md shadow-slate-100 dark:shadow-slate-800 border-4 border-white dark:border-slate-900 relative hover:z-1 hover:scale-105 transition-all duration-500" alt=""></a></li>
                                    <li class="inline-block relative -ms-4"><a href=""><img src="<?php echo $static_url; ?>/images/client/02.jpg" class="size-12 rounded-full shadow-md shadow-slate-100 dark:shadow-slate-800 border-4 border-white dark:border-slate-900 relative hover:z-1 hover:scale-105 transition-all duration-500" alt=""></a></li>
                                    <li class="inline-block relative -ms-4"><a href=""><img src="<?php echo $static_url; ?>/images/client/03.jpg" class="size-12 rounded-full shadow-md shadow-slate-100 dark:shadow-slate-800 border-4 border-white dark:border-slate-900 relative hover:z-1 hover:scale-105 transition-all duration-500" alt=""></a></li>
                                    <li class="inline-block relative -ms-4"><a href=""><img src="<?php echo $static_url; ?>/images/client/04.jpg" class="size-12 rounded-full shadow-md shadow-slate-100 dark:shadow-slate-800 border-4 border-white dark:border-slate-900 relative hover:z-1 hover:scale-105 transition-all duration-500" alt=""></a></li>
                                    <li class="inline-block relative -ms-4"><a href=""><img src="<?php echo $static_url; ?>/images/client/05.jpg" class="size-12 rounded-full shadow-md shadow-slate-100 dark:shadow-slate-800 border-4 border-white dark:border-slate-900 relative hover:z-1 hover:scale-105 transition-all duration-500" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative mt-6">
                <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-6">
                
                    <!-- business-partner code  -->
                    <?php
                        include "$base_dir/Components/Home/business-partner.php";
                    ?>
                
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="relative md:pb-24 pb-16">
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What We Do?</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                   
                    <!-- what-we-do code  -->
                    <?php
                        include "$base_dir/Components/Home/what-we-do.php";
                    ?>

                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                
                <!-- control code  -->
                <?php
                    include "$base_dir/Components/Home/control.php";
                ?>

            </div><!--end container-->

            <div class="container relative md:mt-24 mt-16">
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

                <div class="flex justify-center relative mt-8">
                    <div class="relative w-full">
                        <div class="tiny-three-item">
                            
                            <!-- reviews1 code  -->
                            <?php
                                include "$base_dir/Components/Home/reviews1.php";
                            ?>

                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Meet The Agent Team</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
                    
                    <!-- team code  -->
                    <?php
                        include "$base_dir/Components/Home/team.php";
                    ?>

                </div><!--end grid-->
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Latest Blogs & News</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    
                    <!-- blog code  -->
                    <?php
                        include "$base_dir/Components/Home/blog.php";
                    ?>

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
