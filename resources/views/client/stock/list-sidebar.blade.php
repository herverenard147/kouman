@extends('client.base.style.base')
@section('title', 'List Sidebar')
@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('client/assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">List View Layout
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
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-6">
                    <div class="shadow dark:shadow-gray-700 p-6 rounded-xl bg-white dark:bg-slate-900 sticky top-20">
                        <form>
                            <div class="grid grid-cols-1 gap-3">
                                <div>
                                    <label for="searchname" class="font-medium">Search Properties</label>
                                    <div class="relative mt-2">
                                        <i class="uil uil-search text-lg absolute top-[8px] start-3"></i>
                                        <input name="search" id="searchname" type="text"
                                            class="form-input border border-slate-100 dark:border-slate-800 ps-10"
                                            placeholder="Search">
                                    </div>
                                </div>

                                <div>
                                    <label class="font-medium">Categories</label>
                                    <select
                                        class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                        <option value="re">Residential</option>
                                        <option value="la">Land</option>
                                        <option value="co">Commercial</option>
                                        <option value="ind">Industrial</option>
                                        <option value="inv">Investment</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="font-medium">Location</label>
                                    <select
                                        class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                        <option value="NY">New York</option>
                                        <option value="MC">North Carolina</option>
                                        <option value="SC">South Carolina</option>
                                    </select>
                                </div>

                                <div>
                                    <input type="submit"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full"
                                        value="Apply Filter">
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-8 md:col-span-6">
                    <div class="grid grid-cols-1 gap-[30px]">

                        <!-- listing-list-sidebar code  -->
                        @include('client/base/components/listing/listing-list-sidebar');

                    </div><!--en grid-->

                    <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                        <div class="md:col-span-12 text-center">
                            <nav>
                                <ul class="inline-flex items-center -space-x-px">
                                    <li>
                                        <a href="#"
                                            class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                            <i class="uil uil-angle-left text-[20px]"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="z-10 size-10 inline-flex justify-center items-center mx-1 rounded-full text-white bg-green-600 shadow-sm dark:shadow-gray-700">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">4</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600">
                                            <i class="uil uil-angle-right text-[20px]"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div><!--end grid-->
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
