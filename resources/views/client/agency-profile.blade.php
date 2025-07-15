@extends('layouts.app')

@section('title', 'Agency Profile - Hously')

@section('content')
    <!-- Start -->
    <section class="relative md:py-24 pt-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="p-6 rounded-md bg-green-600/10 dark:bg-green-600/20">
                    <div class="md:flex items-center">
                        <img src="client/assets/images/agency/1.png" class="rounded-full size-28" alt="">

                        <div class="md:ms-4 md:mt-0 mt-4 md:flex justify-between items-end">
                            <div>
                                <h5 class="text-2xl font-medium">Avenue Realty <span
                                        class="text-base md:inline block md:mt-0 mt-2"><span class="text-slate-400"><span
                                                class="mdi mdi-circle-medium align-middle md:inline-block hidden"></span>Real
                                            Estate Agency</span></span></h5>

                                <ul class="list-none mt-2 md:flex items-center md:divide-x-[1px] divide-slate-400">
                                    <li class="md:inline-flex flex">
                                        <ul class="text-amber-400 list-none">
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline"><i class="mdi mdi-star align-middle"></i></li>
                                            <li class="inline text-black dark:text-white">4.84(30)</li>
                                        </ul>
                                    </li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2"><i
                                            data-feather="phone" class="size-4 align-middle text-green-600 me-2"></i> +(458)
                                        456-7854</li>

                                    <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                        <ul class="list-none">
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="facebook" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="instagram" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="twitter" class="size-4"></i></a></li>
                                            <li class="inline"><a href=""
                                                    class="btn btn-icon btn-sm border border-gray-300 dark:border-gray-400 rounded-md text-slate-400 hover:border-green-600 hover:text-white hover:bg-green-600 dark:hover:border-green-600"><i
                                                        data-feather="linkedin" class="size-4"></i></a></li>
                                        </ul><!--end icon-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative mt-6">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-5 order-1 md:order-1">
                    <div class="p-6 rounded shadow dark:shadow-gray-700 sticky top-20">
                        <h5 class="text-xl font-medium mb-4">Contact us</h5>

                        <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="grid grid-cols-1 gap-3">
                                <div>
                                    <label for="name" class="font-medium">Your Name:</label>
                                    <input name="name" id="name" type="text" class="form-input mt-2"
                                        placeholder="Name :">
                                </div>

                                <div>
                                    <label for="email" class="font-medium">Your Email:</label>
                                    <input name="email" id="email" type="email" class="form-input mt-2"
                                        placeholder="Email :">
                                </div>

                                <div>
                                    <label for="subject" class="font-medium">Your Question:</label>
                                    <input name="subject" id="subject" class="form-input mt-2" placeholder="Subject :">
                                </div>

                                <div>
                                    <label for="comments" class="font-medium">Your Comment:</label>
                                    <textarea name="comments" id="comments" class="form-input mt-2 textarea" placeholder="Message :"></textarea>
                                </div>

                                <button type="submit" id="submit" name="send"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-8 md:col-span-7 order-1 md:order-2">
                    <h5 class="text-xl font-medium">About us</h5>

                    <p class="text-slate-400 mt-3">Your real estate business needs a successful company name to better sell
                        real estate and get found in more website search results and stand out on social media sites. Hello
                        real estate agents, here is your inspiration list of catchy, unique, clever and cool, names and
                        logos for your new small business.</p>
                    <p class="text-slate-400 mt-3">Real Estate's favorite three words - Location, Location, Location - Says
                        it all. A well-designed logo using the best fonts can communicate your realty company benefits in
                        just a few words, attracting potential clients - both buyers and seller listings. This list features
                        abstract real estate logos, modern styles, classic emblems and icon designs.</p>

                    <h5 class="text-xl font-medium mt-6">Our Agents</h5>

                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">

                        <!-- agents code  -->
                        @include('client.base.Components.Pages.agents')

                    </div>

                    <h5 class="text-xl font-medium mt-6">Our Listings</h5>

                    <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">

                        <!-- profile code  -->
                        @include('client.base.Components.Pages.profile')

                    </div><!--en grid-->

                    <div class="md:flex justify-center text-center mt-6">
                        <div class="md:w-full">
                            <a href="grid.php"
                                class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">View
                                More Properties <i class="uil uil-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
