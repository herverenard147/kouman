<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Include the common navlink content
ob_start();
include "$base_dir/navbar-center.php"; // This file contains the shared navlink content
$navlink_content = ob_get_clean(); // Capture the navlink content
$page= 'center';
$fpage= 'foot2';

// Optionally define the Hero block content
ob_start();
?>
        
        <!-- Start -->
        <section class="relative">
            <div class="container-fluid">
                <div class="grid lg:grid-cols-2 md:grid-cols-2">
                    <div>
                        <div class="relative mt-12 md:p-8 py-8 px-3">
                            <div class="grid grid-cols-1">
                                <form class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow-md dark:shadow-gray-700">
                                    <div class="registration-form text-dark text-start">
                                        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span class="text-red-600">*</span></label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-search icons"></i>
                                                    <input name="name" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Search your keaywords">
                                                </div>
                                            </div>

                                            <div>
                                                <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">Select Categories:</label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-estate icons"></i>
                                                    <select class="form-select z-2" data-trigger name="choices-catagory" id="choices-catagory-buy" aria-label="Default select example">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div>
                                                <label for="buy-min-price" class="form-label font-medium text-slate-900 dark:text-white">Min Price :</label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-usd-circle icons"></i>
                                                    <select class="form-select" data-trigger name="choices-min-price" id="choices-min-price-buy" aria-label="Default select example">
                                                        <option>Min Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div>
                                                <label for="buy-max-price" class="form-label font-medium text-slate-900 dark:text-white">Max Price :</label>
                                                <div class="filter-search-form relative mt-2">
                                                    <i class="uil uil-usd-circle icons"></i>
                                                    <select class="form-select" data-trigger name="choices-max-price" id="choices-max-price-buy" aria-label="Default select example">
                                                        <option>Max Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="lg:mt-6">
                                                <input type="submit" id="search-buy" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
                                            </div>
                                        </div><!--end grid-->
                                    </div><!--end container-->
                                </form><!--end form-->
                            </div><!--end grid-->
    
                            <div class="grid lg:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                                
                                <!-- listing-grid code  -->
                                <?php
                                    include "$base_dir/Components/Listing/listing-grid.php";
                                ?>

                            </div><!--en grid-->

                            <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                                <div class="md:col-span-12 text-center">
                                    <nav>
                                        <ul class="inline-flex items-center -space-x-px">
                                            <li>
                                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                                    <i class="uil uil-angle-left text-[20px]"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">2</a>
                                            </li>
                                            <li>
                                                <a href="#" aria-current="page" class="z-10 size-10 inline-flex justify-center items-center mx-1 rounded-full text-white bg-green-600 shadow-sm dark:shadow-gray-700">3</a>
                                            </li>
                                            <li>
                                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">4</a>
                                            </li>
                                            <li>
                                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                                    <i class="uil uil-angle-right text-[20px]"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div><!--end grid-->
                        </div>
                        
 
                        
                    </div>

                    <div class="relative md:block hidden">
                        <div class="map border-0 fixed w-full leading-[0]">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" class="w-full h-screen" allowfullscreen></iframe>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
include "$base_dir/style/base.php";
?>