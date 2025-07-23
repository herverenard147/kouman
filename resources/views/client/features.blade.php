@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Fonctionnalités')
@section('content')
    <!-- Début Héros -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{asset('client/assets/images/bg/01.jpg')}}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Services / Fonctionnalités</h3>
            </div><!-- fin grid -->
        </div><!-- fin container -->
    </section><!-- fin section -->
    <div class="relative">
        <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Fin Héros -->

    <!-- Début -->
    <section class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-x-[30px] gap-y-[50px]">

                <!-- services -->
                @include("client.base.components.pages.services")

            </div><!-- fin grid -->
        </div><!-- fin container -->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Ce que disent nos clients</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Une excellente plateforme pour acheter, vendre et louer vos biens sans agent ni commission.</p>
            </div><!-- fin grid -->

            <div class="flex justify-center relative mt-16">
                <div class="relative lg:w-1/3 md:w-1/2 w-full">
                    <div class="absolute -top-20 md:-start-24 -start-0">
                        <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                    </div>

                    <div class="absolute bottom-28 md:-end-24 -end-0">
                        <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                    </div>

                    <div class="tiny-single-item">
                        <!-- avis clients -->
                        @include("client.base.components.home.reviews")
                    </div>
                </div>
            </div><!-- fin grid -->
        </div><!-- fin container -->

        <div class="container relative lg:mt-24 mt-16">
            <!-- contact -->
            @include("client.base.components.home.get-in-touch")
        </div><!-- fin container -->
    </section><!-- fin section -->
    <!-- Fin -->
@endsection
