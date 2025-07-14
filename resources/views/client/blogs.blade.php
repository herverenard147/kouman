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
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Blogs & News</h3>
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

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                {{-- blog1 content --}}
                @include('client.Base.Components.Pages.blog1')
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                <div class="md:col-span-12 text-center">
                    <nav>
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                <a href="#"
                                    class="size-10 inline-flex justify-center items-center mx-1 rounded-full 
                                    text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm 
                                    dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 
                                    hover:bg-green-600 dark:hover:bg-green-600">
                                    <i class="uil uil-angle-left text-[20px]"></i>
                                </a>
                            </li>
                            @for ($i = 1; $i <= 4; $i++)
                                <li>
                                    <a href="#"
                                        class="size-10 inline-flex justify-center items-center mx-1 rounded-full 
                                       {{ $i == 3
                                           ? 'text-white bg-green-600 z-10 shadow-sm dark:shadow-gray-700'
                                           : 'text-slate-400 hover:text-white bg-white dark:bg-slate-900 
                                                                                           shadow-sm dark:shadow-gray-700 hover:border-green-600 
                                                                                           dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li>
                                <a href="#"
                                    class="size-10 inline-flex justify-center items-center mx-1 rounded-full 
                                    text-slate-400 bg-white dark:bg-slate-900 hover:text-white shadow-sm 
                                    dark:shadow-gray-700 hover:border-green-600 dark:hover:border-green-600 
                                    hover:bg-green-600 dark:hover:bg-green-600">
                                    <i class="uil uil-angle-right text-[20px]"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
@endsection
