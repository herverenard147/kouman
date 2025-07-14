<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-light.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page = 'light';
$fpage = 'foot';

// Optionally define the Hero block content
ob_start();
?>

<!-- Start Hero -->
<section
    class="relative table w-full py-32 lg:py-36 bg-[url('../../<?php echo $static_url; ?>/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Services / Features
            </h3>
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
<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-x-[30px] gap-y-[50px]">

            <!-- services code  -->
            <?php
            include "$base_dir/Components/Pages/services.php";
            ?>

        </div><!--end grid-->
    </div><!--end container-->

    <div class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say ?
            </h3>

            <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                any agent or commisions.</p>
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
