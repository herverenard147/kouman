<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Hously - Real Estate Landing & Admin Dashboard Template')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Real Estate Website Landing Page" name="description" />
    <meta content="Real Estate, buy, sell, Rent, tailwind Css" name="keywords" />
    <meta name="author" content="Shreethemes" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="2.3.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('client/assets/images/favicon.ico') }}" />

    <!-- Css -->
    <link href="{{ asset('client/assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('client/assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('client/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/output.css') }}" />

    @stack('styles')
</head>


<body class="dark:bg-slate-900">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    {{-- Navbar --}}
    @isset($page)
        @if ($page === 'dark')
            @include('client.Base.style.navbar-dark')
        @elseif($page === 'light')
            @include('client.Base.style.navbar-light')
        @elseif($page === 'tagline-dark')
            @include('client.Base.style.navbar-tagline-dark')
        @elseif($page === 'center')
            @include('client.Base.style.navbar-center')
        @else
            @include('client.Base.style.no-header')
        @endif
    @else
        @include('client.Base.style.no-header')
    @endisset

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @isset($fpage)
        @if ($fpage === 'foot')
            @include('client.Base.style.footer')
        @elseif($fpage === 'foot1')
            @include('client.Base.style.footer1')
        @else
            @include('client.Base.style.footer2')
        @endif
    @else
        @include('client.Base.style.footer2')
    @endisset

    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-3">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-[40%] -left-3 z-50">
        <a href="" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-green-600 text-white justify-center items-center"><i
            class="uil uil-arrow-up"></i></a>
    <!-- Back to top -->


    <!-- JAVASCRIPTS -->
    <script src="{{ asset('client/assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('client/assets/libs/gumshoejs/gumshoe.polyfills.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/easy_background.js') }}"></script>
    <script src="{{ asset('client/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('client/assets/js/app.js') }}"></script>
    <!-- JAVASCRIPTS -->

    @stack('scripts')


</body>

</html>
