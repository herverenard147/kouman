@extends('client.base.style.base')
@section('title', 'Two')
@section('content')

    <!-- Hero Start -->
    <section class="relative table w-full py-36 lg:py-44 overflow-hidden zoom-image">
        <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{ asset('client/assets/images/bg/04.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-black/70 z-2"></div>
        <div class="container relative z-3">
            <div class="grid grid-cols-1 mt-10">
                <div class="text-center">
                    <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Easy way to
                        find your <br> dream property</h1>
                    <p class="text-white/70 text-xl max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                        without any agent or commisions.</p>
                </div>

                <ul class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-t-xl border-b dark:border-gray-800 mt-10"
                    id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                    <li role="presentation" class="inline-block">
                        <button
                            class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full hover:text-green-600 transition-all duration-500 ease-in-out"
                            id="buy-home-tab" data-tabs-target="#buy-home" type="button" role="tab"
                            aria-controls="buy-home" aria-selected="true">Buy</button>
                    </li>
                    <li role="presentation" class="inline-block">
                        <button
                            class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out"
                            id="sell-home-tab" data-tabs-target="#sell-home" type="button" role="tab"
                            aria-controls="sell-home" aria-selected="false">Sell</button>
                    </li>
                    <li role="presentation" class="inline-block">
                        <button
                            class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out"
                            id="rent-home-tab" data-tabs-target="#rent-home" type="button" role="tab"
                            aria-controls="rent-home" aria-selected="false">Rent</button>
                    </li>
                </ul>

                <div id="StarterContent"
                    class="p-6 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
                    <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                        <form action="#">
                            <div class="registration-form text-dark text-start">
                                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span
                                                class="text-red-600">*</span></label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-search icons"></i>
                                            <input name="name" type="text" id="job-keyword"
                                                class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                placeholder="Search your keaywords">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-properties"
                                            class="form-label font-medium text-slate-900 dark:text-white">Select
                                            Categories:</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-estate icons"></i>
                                            <select class="form-select z-2" data-trigger name="choices-catagory"
                                                id="choices-catagory-buy" aria-label="Default select example">
                                                <option>Houses</option>
                                                <option>Apartment</option>
                                                <option>Offices</option>
                                                <option>Townhome</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-min-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Min Price
                                            :</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-min-price"
                                                id="choices-min-price-buy" aria-label="Default select example">
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
                                        <label for="buy-max-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Max Price
                                            :</label>
                                        <div class="filter-search-form relative mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-max-price"
                                                id="choices-max-price-buy" aria-label="Default select example">
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
                                        <input type="submit" id="search-buy" name="search"
                                            class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                            value="Search">
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>

                    <div class="hidden" id="sell-home" role="tabpanel" aria-labelledby="sell-home-tab">
                        <form action="#">
                            <div class="registration-form text-dark text-start">
                                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span
                                                class="text-red-600">*</span></label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-search icons"></i>
                                            <input name="name" type="text" id="job-keyword"
                                                class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                placeholder="Search your keaywords">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-properties"
                                            class="form-label font-medium text-slate-900 dark:text-white">Select
                                            Categories:</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-estate icons"></i>
                                            <select class="form-select z-2" data-trigger name="choices-catagory"
                                                id="choices-catagory-sell" aria-label="Default select example">
                                                <option>Houses</option>
                                                <option>Apartment</option>
                                                <option>Offices</option>
                                                <option>Townhome</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-min-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Min Price
                                            :</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-min-price"
                                                id="choices-min-price-sell" aria-label="Default select example">
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
                                        <label for="buy-max-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Max Price
                                            :</label>
                                        <div class="filter-search-form relative mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-max-price"
                                                id="choices-max-price-sell" aria-label="Default select example">
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
                                        <input type="submit" id="search-sell" name="search"
                                            class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                            value="Search">
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>

                    <div class="hidden" id="rent-home" role="tabpanel" aria-labelledby="rent-home-tab">
                        <form action="#">
                            <div class="registration-form text-dark text-start">
                                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Search : <span
                                                class="text-red-600">*</span></label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-search icons"></i>
                                            <input name="name" type="text" id="job-keyword"
                                                class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                placeholder="Search your keaywords">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-properties"
                                            class="form-label font-medium text-slate-900 dark:text-white">Select
                                            Categories:</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-estate icons"></i>
                                            <select class="form-select z-2" data-trigger name="choices-catagory"
                                                id="choices-catagory-rent" aria-label="Default select example">
                                                <option>Houses</option>
                                                <option>Apartment</option>
                                                <option>Offices</option>
                                                <option>Townhome</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="buy-min-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Min Price
                                            :</label>
                                        <div class="filter-search-form relative filter-border mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-min-price"
                                                id="choices-min-price-rent" aria-label="Default select example">
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
                                        <label for="buy-max-price"
                                            class="form-label font-medium text-slate-900 dark:text-white">Max Price
                                            :</label>
                                        <div class="filter-search-form relative mt-2">
                                            <i class="uil uil-usd-circle icons"></i>
                                            <select class="form-select" data-trigger name="choices-max-price"
                                                id="choices-max-price-rent" aria-label="Default select example">
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
                                        <input type="submit" id="search-rent" name="search"
                                            class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                            value="Search">
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">

            <!-- control code  -->
            @include('client/base/Components/Home/control') ;

        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">How It Works</h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">

                <!-- features code  -->
                @include('client/base/Components/Home/features') ;

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured Properties
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid grid-cols-1 mt-8 relative">
                <div class="tiny-home-slide-three">

                    <!-- properties1 code  -->
                    @include('client/base/Components/Home/properties1') ;

                </div>
            </div><!--en grid-->
        </div><!--end container-->
    </section><!--end section-->

    <!-- Start CTA -->
    <section class="relative py-24 bg-no-repeat bg-center bg-fixed bg-cover"
        style="background-image: url('{{ asset('client/assets/images/bg/04.jpg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="container relative">
            <div class="grid lg:grid-cols-12 grid-cols-1 md:text-start text-center justify-center">
                <div class="lg:col-start-2 lg:col-span-10">
                    <div class="grid md:grid-cols-3 grid-cols-1 items-center">

                        <!-- cta code  -->
                        @include('client/base/Components/Home/cta') ;

                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End CTA -->

    <!-- Business Partner -->
    <section class="pt-10">
        <div class="container relative">
            <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">

                <!-- business-partner code  -->
                @include('client/base/Components/Home/business-partner') ;

            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Business Partner -->

    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say ?
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="flex justify-center relative mt-8">
                <div class="relative w-full">
                    <div class="tiny-three-item">

                        <!-- reviews1 code  -->
                        @include('client/base/Components/Home/reviews1') ;

                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">

            <!-- get-in-touch code  -->
            @include('client/base/Components/Home/get-in-touch') ;

        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
