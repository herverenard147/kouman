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
?>

        <!-- Start Hero -->
        <section class="relative table w-full py-32 lg:py-36 bg-[url('../../<?php echo $static_url; ?>/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black opacity-80"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 text-center mt-10">
                    <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Privacy Policy</h3>
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

        <!-- Start Terms & Conditions -->
        <section class="relative lg:py-24 py-16">
            <div class="container relative">
                <div class="md:flex justify-center">
                    <div class="md:w-3/4">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                            <h5 class="text-xl font-medium mb-4">Overview :</h5>
                            <p class="text-slate-400">It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>
                            <p class="text-slate-400">In the 1960s, the text suddenly became known beyond the professional circle of typesetters and layout designers when it was used for Letraset sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the text were subsequently included in DTP programmes such as PageMaker etc.</p>
                            <p class="text-slate-400">There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories.</p>
                        
                            <h5 class="text-xl font-medium mb-4 mt-8">We use your information to :</h5>
                            <ul class="list-unstyled text-slate-400 mt-4">
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Our Talented & Experienced Marketing Agency</li>
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Create your own skin to match your brand</li>
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Our Talented & Experienced Marketing Agency</li>
                                <li class="flex mt-2"><i class="uil uil-arrow-right text-green-600 align-middle me-2"></i>Create your own skin to match your brand</li>
                            </ul>

                            <h5 class="text-xl font-medium mb-4 mt-8">Information Provided Voluntarily :</h5>
                            <p class="text-slate-400">In the 1960s, the text suddenly became known beyond the professional circle of typesetters and layout designers when it was used for Letraset sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the text were subsequently included in DTP programmes such as PageMaker etc.</p>

                            <div class="mt-8">
                                <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Print</a>
                            </div>
                        </div>
                    </div><!--end -->
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Terms & Conditions -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
include "$base_dir/style/base.php";
?>