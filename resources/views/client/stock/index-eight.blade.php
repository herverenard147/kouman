@extends('client.base.style.base')
@section('title', 'Index-eight View Layout')

@section('content')
    <!-- Hero Start -->
    <section
        class="relative overflow-hidden md:h-screen pt-36 md:pb-48 pb-64 bg-green-600/10 dark:bg-green-600/20 bg-[url('{{ asset('client/assets/images/bg/bg2.png') }}')] bg-no-repeat bg-bottom bg-cover">
        <div class="container relative">
            <div class="grid grid-cols-1 items-center mt-10">
                <div class="text-center">
                    <h1 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Explore Listings and
                        <br> Make Move Today
                    </h1>
                    <p class="text-slate-400 text-xl max-w-xl mx-auto">A great plateform to buy, sell and rent your
                        properties without any agent or commisions.</p>

                    <div class="subcribe-form z-1 max-w-2xl mx-auto mt-8">
                        <form class="relative">
                            <i data-feather="search" class="size-5 absolute top-[47%] -translate-y-1/2 start-4"></i>
                            <input type="name" id="search_name" name="name"
                                class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 ps-12"
                                placeholder="City, Address, Zip :">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">Find
                                Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 md:gap-[30px] gap-3">

                <!-- categories code  -->
                @include('client/base/Components/Home/categories') ;
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What We Do?</h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">

                <!-- what-we-do code  -->
                @include('client/base/Components/Home/what-we-do') ;

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured Properties
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">

                <!-- properties code  -->
                @include('client/base/Components/Home/properties') ;

            </div><!--en grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Start CTA -->
    <section
        class="relative py-24 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-fixed bg-cover">
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

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say
                    ?
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without
                    any agent or commisions.</p>
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
                        @include('client/base/Components/Home/reviews') ;

                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Meet The Agent Team
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">

                <!-- team code  -->
                @include('client/base/Components/Home/team') ;

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">

            <!-- get-in-touch code  -->
            @include('client/base/Components/Home/get-in-touch') ;

        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

@endsection
