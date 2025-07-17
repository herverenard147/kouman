<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title') | Afrique Évasion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Real Estate Website Landing Page" name="description" />
    <meta content="Real Estate, buy, sell, Rent, tailwind Css" name="keywords" />
    <meta name="author" content="kw legal tech" />
    <meta name="website" content="https://kwlegaltech.com/" />
    <meta name="email" content="contact@kwlegaltech.com" />
    <meta name="version" content="2.3.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('client/assets/images/b.ico') }}" />

    <!-- Css -->
    <link href="{{ asset('client/assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('client/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
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
        @switch($page)
            @case('dark')
                @include('client.base.style.navbar-dark')
                @break
            @case('light')
                @include('client.base.style.navbar-light')
                @break
            @case('tagline-dark')
                @include('client.base.style.navbar-tagline-dark')
                @break
            @case('center')
                @include('client.base.style.navbar-center')
                @break
            @default
                @include('client.base.style.no-header')
        @endswitch
    @else
        @include('client.base.style.no-header')
    @endisset

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @isset($fpage)
        @switch($fpage)
            @case('foot')
                @include('client.base.style.footer')
                @break
            @case('foot1')
                @include('client.base.style.footer1')
                @break
            @default
                @include('client.base.style.footer2')
        @endswitch
    @else
        @include('client.base.style.footer2')
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

    <!-- LTR & RTL -->
    <div class="fixed top-[40%] -left-3 z-50">
        <a href="#" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md font-semibold rtl:block ltr:hidden">
                LTR
            </span>
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md font-semibold ltr:block rtl:hidden">
                RTL
            </span>
        </a>
    </div>

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-green-600 text-white justify-center items-center">
        <i class="uil uil-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('client/assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('client/assets/libs/gumshoejs/gumshoe.polyfills.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('client/assets/libs/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/easy_background.js') }}"></script>
    <script src="{{ asset('client/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('client/assets/js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
