<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Afrique évasion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template">
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="kw legal tech">
    <meta name="website" content="https://kwlegaltech.com/">
    <meta name="email" content="contact@kwlegaltech.com">
    <meta name="version" content="2.3.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    {{-- <link rel="shortcut icon" href="{{ $static_url }}/images/favicon.ico"> --}}
    <link rel="shortcut icon" href="{{ asset('client/assets/images/b.ico') }}" alt="Logo">


    <!-- CSS -->
    {{-- @vite(['resources/css/app.css']) --}}
    <!-- Css -->
    <link href="{{asset('libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet">
    <link href="{{asset('libs/tobii/css/tobii.min.css')}}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{asset('libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('libs/mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/output.css')}}" />

    @stack('styles')
</head>

<body class="font-body text-base text-black">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <div class="page-wrapper toggled">
        <main class="page-content bg-gray-50">

            {{-- Navbar --}}
            @include('content.navbar')

            {{-- Sidebar dynamique --}}
            @if(auth()->guard('admin')->check())
            @include('content.sidebarAdmin')
            @elseif(auth()->guard('partenaire')->check())
            @include('content.sidebar')
            @endif

            {{-- Main Content --}}
            <main>
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('content.footer')
        </main>
    </div>


    <!-- Switcher -->
    <div class="fixed top-[30%] -end-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
            <label class="label bg-slate-900 shadow cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                <i data-feather="moon" class="size-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="size-[18px] text-yellow-500"></i>
                <span class="ball bg-white rounded-full absolute top-[2px] left-[2px] size-7"></span>
            </label>
        </span>
    </div>

    <!-- LTR & RTL Switch -->
    <div class="fixed top-[40%] -end-3 z-50">
        <a href="#" id="switchRtl">
            <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white shadow-md font-bold rtl:block ltr:hidden">LTR</span>
            <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white shadow-md font-bold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>

    <!-- JAVASCRIPTS -->
    {{-- @vite(['resources/js/app.js']) --}}
    <script src="{{asset('libs/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('libs/shufflejs/shuffle.min.js')}}"></script>
    <script src="{{asset('libs/tobii/js/tobii.min.js')}}"></script>
    <script src="{{asset('libs/jsvectormap/maps/world.js')}}"></script>
    <script src="{{asset('js/jsvectormap.init.js')}}"></script>
    <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('js/plugins.init.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @stack('scripts')
</body>

</html>