@extends('client.base.style.base')
@section('title', 'Sell Your Home | Afrique évasion')
@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('client/assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Sell Faster. Save
                    Thousands.</h3>
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
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">How It Works</h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">

                <!-- features code  -->

                @include('client.base.components.home.features')

            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Brokerage Calculator
                </h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                    any agent or commisions.</p>
            </div><!--end grid-->

            <div class="md:flex justify-center mt-8">
                <div class="lg:w-3/5 md:w-4/5">
                    <div class="p-6 shadow dark:shadow-gray-700 rounded-md" role="form">
                        <ul class="list-none flex justify-between">
                            <li class="h6">Min $ 10000</li>
                            <li class="h6">Max $ 200000</li>
                        </ul>

                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <label for="slider" class="form-label"></label>
                                <input id="slider" type="range" value="10000" min="10000" max="200000"
                                    class="w-full h-2 bg-gray-100 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            </div><!--end col-->
                        </div><!--end row-->

                        <ul class="list-none text-center md:flex justify-between">
                            <li>
                                <ul class="text-md-start brokerage-form list-none">
                                    <li class="font-medium"><label class="control-label">Total Value ($)</label></li>
                                    <li><input type="hidden" id="amount" class="form-control"><span
                                            class="text-green-600">$</span>
                                        <p class="inline-block h5 text-green-600" id="amount-label"></p>
                                    </li>
                                </ul>
                            </li>

                            <li class="mt-2 mt-sm-0">
                                <ul class="text-md-end brokerage-form list-none">
                                    <li class="font-medium"><label class="control-label">Brokerage Fee ($)</label></li>
                                    <li><input type="hidden" id="saving" class="form-control"><span
                                            class="text-green-600">$</span>
                                        <p class="inline-block h5 text-green-600" id="saving-label"></p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
