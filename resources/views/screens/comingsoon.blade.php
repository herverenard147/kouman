

@extends('content.no-sidebar', [
    'title' => 'Coming Soon',
    'description' => 'We are working hard to bring you the best experience. Stay tuned for updates.',
    'keywords' => 'coming soon, real estate, properties, buy, sell, rent',
    'canonical' => url()->current(),
])
@section('title', 'Coming Soon')
@section('content')

    <section class="md:h-screen py-36 flex items-center justify-center relative overflow-hidden zoom-image">
        <div class="absolute inset-0 image-wrap z-1 bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container-fluid relative z-3">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                    <div class="text-center">
                        <a href="{{route('index')}}"><img src="{{asset('/images/logo-icon-64.png')}}" class="mx-auto" alt=""></a>
                    </div>
                    <div class="title-heading text-center my-auto">
                        <h1 class="text-white mt-3 mb-6 md:text-5xl text-3xl font-bold">We Are Coming Soon...</h1>
                        <p class="text-white/70 text-lg max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>

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
                    <div class="text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Design & Develop with  by <a href="https://kwlegaltech.com//" target="_blank" class="text-reset">kw legal tech</a>.</p>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section -->
@endsection
