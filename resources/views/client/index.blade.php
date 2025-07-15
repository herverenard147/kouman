@extends('client.base.style.base')
@section('title', 'Accueil')
@section('navlink')
    @include('client.base.style.navbar-dark')
@endsection
@section('content')

    <!-- Hero Start -->
    <section class="relative mt-20">
        <div class="container-fluid md:mx-4 mx-2">
            <div class="relative pt-40 pb-52 table w-full rounded-2xl shadow-md overflow-hidden" id="home">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="container relative">
                    <div class="grid grid-cols-1">
                        <div class="md:text-start text-center">
                            <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">
                                We will help you find <br> your <span class="text-green-600">Wonderful</span> home
                            </h1>
                            <p class="text-white/70 text-xl max-w-xl">
                                A great platform to buy, sell and rent your properties without any agent or commissions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Start Tabs Section -->
    <section class="relative md:pb-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1 justify-center">
                <div class="relative -mt-32">
                    @include('client.base.Components.Buy.tab')
                </div>
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            @include('client.base.Components.Home.control')
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">How It Works</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    A great platform to buy, sell and rent your properties without any agent or commissions.
                </p>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @include('client.base.Components.Home.features')
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">Featured Properties</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    A great platform to buy, sell and rent your properties without any agent or commissions.
                </p>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @include('client.base.Components.Home.properties')
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl text-2xl font-semibold">What Our Client Say ?</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    A great platform to buy, sell and rent your properties without any agent or commissions.
                </p>
            </div>
            <div class="flex justify-center relative mt-16">
                <div class="relative lg:w-1/3 md:w-1/2 w-full">
                    <div class="absolute -top-20 md:-start-24 -start-0">
                        <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                    </div>
                    <div class="absolute bottom-28 md:-end-24 -end-0">
                        <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                    </div>
                    <div class="tiny-single-item">
                        @include('client.base.Components.Home.reviews')
                    </div>
                </div>
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            @include('client.base.Components.Home.get-in-touch')
        </div>
    </section>
    <!-- End -->

@endsection
