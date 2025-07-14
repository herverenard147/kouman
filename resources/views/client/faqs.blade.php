@extends('client.Base.style.base')

@section('navlink')
    @include('client.Base.style.navbar-light')
@endsection

@section('content')
    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Frequently Asked
                    Questions</h3>
            </div>
        </div>
    </section>

    <div class="relative">
        <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="rounded-md shadow dark:shadow-gray-700 p-6 sticky top-20">
                        <ul class="list-unstyled sidebar-nav mb-0 py-0" id="navmenu-nav">
                            <li class="navbar-item p-0"><a href="#tech" class="text-base font-medium navbar-link">Buying
                                    Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#general"
                                    class="text-base font-medium navbar-link">General Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#payment"
                                    class="text-base font-medium navbar-link">Payments Questions</a></li>
                            <li class="navbar-item mt-3 p-0"><a href="#support"
                                    class="text-base font-medium navbar-link">Support Questions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-8 md:col-span-7">
                    {{-- Buying Section --}}
                    <div id="tech">
                        <h5 class="text-2xl font-semibold">Buying Product</h5>
                        @include('client.Base.Components.FAQ.buying')
                    </div>

                    {{-- General Section --}}
                    <div id="general" class="mt-8">
                        <h5 class="text-2xl font-semibold">General Questions</h5>
                        @include('client.Base.Components.FAQ.general')
                    </div>

                    {{-- Payments Section --}}
                    <div id="payment" class="mt-8">
                        <h5 class="text-2xl font-semibold">Payments Questions</h5>
                        @include('client.Base.Components.FAQ.payment')
                    </div>

                    {{-- Support Section --}}
                    <div id="support" class="mt-8">
                        <h5 class="text-2xl font-semibold">Support Questions</h5>
                        @include('client.Base.Components.FAQ.support')
                    </div>
                </div>
            </div>
        </div>

        <!-- Get in touch section -->
        <div class="container relative lg:mt-24 mt-16">
            @include('client.Base.Components.Home.get-in-touch')
        </div>
    </section>
    <!-- End -->
@endsection
