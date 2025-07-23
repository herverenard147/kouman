@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Nos Partenaires')

@section('content')
    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{asset('client/assets/images/bg/01.jpg')}}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Nos Partenaires</h3>
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
    <section class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">

                <!-- agencies code  -->
                @include('client.base.components.pages.agencies')

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">

            <!-- get-in-touch code  -->
            @include('client.base.components.home.get-in-touch')

        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
