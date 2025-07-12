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
        <section class="swiper-slider-hero relative block h-screen" id="home">
            <div class="swiper-container absolute end-0 top-0 size-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 size-full slide-bg-image flex items-center bg-center;" data-background="<?php echo $static_url; ?>/images/bg/01.jpg">
                            <div class="absolute inset-0 bg-black/70"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <div class="text-center">
                                        <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Easy way to find your <br> dream property</h1>
                                        <p class="text-white/70 text-xl max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                                        
                                        <div class="mt-6">
                                            <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">See More</a>
                                        </div>
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </div><!-- end slide-inner --> 
                    </div> <!-- end swiper-slide -->

                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 size-full slide-bg-image flex items-center bg-center;" data-background="<?php echo $static_url; ?>/images/bg/02.jpg">
                            <div class="absolute inset-0 bg-black/70"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <div class="text-center">
                                        <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">We will help you find <br> your Wonderful home</h1>
                                        <p class="text-white/70 text-xl max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                                        
                                        <div class="mt-6">
                                            <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">See More</a>
                                        </div>
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </div><!-- end slide-inner --> 
                    </div> <!-- end swiper-slide -->
                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
                <!-- <div class="swiper-pagination"></div> -->
                <div class="swiper-button-next bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-green-600 hover:border-green-600 rounded-full text-center"></div>
                <div class="swiper-button-prev bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-green-600 hover:border-green-600 rounded-full text-center"></div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="relative md:pb-24 pb-16">
            <div class="container relative z-1">
                <div class="grid grid-cols-1 justify-center">
                    <div class="relative md:-mt-52 -mt-40">
                        <div class="grid grid-cols-1">
                            <ul class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-t-xl border-b dark:border-gray-800 mt-10" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                                <li role="presentation" class="inline-block">
                                    <button class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full hover:text-green-600 transition-all duration-500 ease-in-out" id="buy-home-tab" data-tabs-target="#buy-home" type="button" role="tab" aria-controls="buy-home" aria-selected="true">Buy</button>
                                </li>
                                <li role="presentation" class="inline-block">
                                    <button class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out" id="sell-home-tab" data-tabs-target="#sell-home" type="button" role="tab" aria-controls="sell-home" aria-selected="false">Sell</button>
                                </li>
                                <li role="presentation" class="inline-block">
                                    <button class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out" id="rent-home-tab" data-tabs-target="#rent-home" type="button" role="tab" aria-controls="rent-home" aria-selected="false">Rent</button>
                                </li>
                            </ul>

                            <div id="StarterContent" class="p-6 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
                                <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                                    <form action="#">
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
                                    </form>
                                </div>

                                <div class="hidden" id="sell-home" role="tabpanel" aria-labelledby="sell-home-tab">
                                    <form action="#">
                                        <div class="registration-form text-dark ltr:text-start rtl:text-end">
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
                                                        <select class="form-select z-2" data-trigger name="choices-catagory" id="choices-catagory-sell" aria-label="Default select example">
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
                                                        <select class="form-select" data-trigger name="choices-min-price" id="choices-min-price-sell" aria-label="Default select example">
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
                                                        <select class="form-select" data-trigger name="choices-max-price" id="choices-max-price-sell" aria-label="Default select example">
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
                                                    <input type="submit" id="search-sell" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
                                                </div>
                                            </div><!--end grid-->
                                        </div><!--end container-->
                                    </form>
                                </div>

                                <div class="hidden" id="rent-home" role="tabpanel" aria-labelledby="rent-home-tab">
                                    <form action="#">
                                        <div class="registration-form text-dark ltr:text-start rtl:text-end">
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
                                                        <select class="form-select z-2" data-trigger name="choices-catagory" id="choices-catagory-rent" aria-label="Default select example">
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
                                                        <select class="form-select" data-trigger name="choices-min-price" id="choices-min-price-rent" aria-label="Default select example">
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
                                                        <select class="form-select" data-trigger name="choices-max-price" id="choices-max-price-rent" aria-label="Default select example">
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
                                                    <input type="submit" id="search-rent" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
                                                </div>
                                            </div><!--end grid-->
                                        </div><!--end container-->
                                    </form>
                                </div>
                            </div>
                        </div><!--end grid-->
                    </div>
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

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] mt-8">
                    
                    <!-- properties2 code  -->
                    <?php
                        include "$base_dir/Components/Home/properties2.php";
                    ?>
                
                </div><!--en grid-->

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