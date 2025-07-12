<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-dark.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page= 'dark';
$fpage= 'foot1';

// Optionally define the Hero block content
ob_start();
?>

        <!-- Google Map -->
        <div class="container-fluid relative mt-20">
            <div class="grid grid-cols-1">
                <div class="w-full leading-[0] border-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative -mt-[25px]">
            <div class="grid grid-cols-1">
                <div class="subcribe-form z-1">
                    <form class="relative max-w-2xl mx-auto">
                        <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                        <input type="name" id="search_name" name="name" class="rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12" placeholder="City, Address, Zip :">
                        <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Search</button>
                    </form><!--end form-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <!-- Google Map -->
        
        <!-- Start -->
        <section class="relative lg:py-24 py-16">
            <div class="container relative">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px]">
                    
                    <!-- properties2 code  -->
                    <?php
                        include "$base_dir/Components/Home/properties2.php";
                    ?>

                </div><!--end grid-->

                <div class="md:flex justify-center text-center mt-6">
                    <div class="md:w-full">
                        <a href="list.php" class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">View More Properties <i class="uil uil-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div><!--end container-->

            <div class="container relative lg:mt-24 mt-16 lg:pt-24 pt-16">
                <div class="absolute inset-0 opacity-25 dark:opacity-50 bg-[url('../../<?php echo $static_url; ?>/images/map.png')] bg-no-repeat bg-center bg-cover"></div>
                <div class="relative grid grid-cols-1 pb-8 text-center z-1">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Trusted by more than 10K users</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                </div><!--end grid-->

                <div class="relative grid md:grid-cols-3 grid-cols-1 items-center mt-8 gap-[30px] z-1">
                    
                        <!-- cta1 code  -->
                        <?php
                            include "$base_dir/Components/Home/cta1.php";
                        ?>

                </div>
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