@php
    $page = 'light';
    $fpage = 'foot';
@endphp
@extends('client.base.style.base')
@section('title', 'Grid View Layout')
@section('content')
    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('/Hously_Landing/assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Find Your Dream Home
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

    <div class="container relative -mt-[25px]">
        <div class="grid grid-cols-1">
            <div class="subcribe-form z-1">
                <form class="relative max-w-2xl mx-auto">
                    <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                    <input type="text" id="search_name" name="name"
                        class="rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12"
                        placeholder="City, Address, Zip :">
                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Search</button>
                </form><!--end form-->
            </div>
        </div><!--end grid-->
    </div><!--end container-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured Properties
                </h3>
                <p class="text-slate-400 max-w-xl mx-auto">A great platform to buy, sell and rent your properties without
                    any agent or commissions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @include('client.base.components.home.properties')
            </div><!--end grid-->

            <div class="md:flex justify-center text-center mt-6">
                <div class="md:w-full">
                    <a href="{{ url('grid') }}"
                        class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">View
                        More Properties <i class="uil uil-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Buyer Benefits</h3>
                <p class="text-slate-400 max-w-xl mx-auto">A great platform to buy, sell and rent your properties without
                    any agent or commissions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @include('client.base.components.buy.buyer-benefits')
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            @include('client.base.components.buy.tab')
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            @include('client.base.components.home.get-in-touch')
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
