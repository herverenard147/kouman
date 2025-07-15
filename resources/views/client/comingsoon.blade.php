@extends('client.base.style.no-header')

@section('content')
    <section class="md:h-screen py-36 flex items-center justify-center relative overflow-hidden zoom-image">
        <div class="absolute inset-0 image-wrap z-1 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>

        <div class="container-fluid relative z-3">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">

                    <!-- Logo -->
                    <div class="text-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('client/assets/images/logo-icon-64.png') }}" class="mx-auto" alt="Logo">
                        </a>
                    </div>

                    <!-- Coming Soon Content -->
                    <div class="title-heading text-center my-auto">
                        <h1 class="text-white mt-3 mb-6 md:text-5xl text-3xl font-bold">We Are Coming Soon...</h1>
                        <p class="text-white/70 text-lg max-w-xl mx-auto">
                            A great platform to buy, sell and rent your properties without any agent or commissions.
                        </p>

                        <!-- Countdown -->
                        <div id="countdown">
                            <ul class="count-down list-none inline-block text-white text-center mt-8 m-6">
                                <li id="days" class="count-number inline-block m-2"></li>
                                <li id="hours" class="count-number inline-block m-2"></li>
                                <li id="mins" class="count-number inline-block m-2"></li>
                                <li id="secs" class="count-number inline-block m-2"></li>
                                <li id="end" class="h1"></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center">
                        <p class="mb-0 text-slate-400">
                            © <script>document.write(new Date().getFullYear())</script> Hously.
                            Design & Develop with <i class="mdi mdi-heart text-red-600"></i> by
                            <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
