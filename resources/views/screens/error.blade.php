@extends('content.no-sidebar', [
    'title' => 'Error 404',
    'description' => 'The page you are looking for does not exist.',
    'keywords' => 'error, 404, not found, real estate, properties',
    'canonical' => url()->current(),
])
@section('title', 'Error 404')
@section('content')
    <section class="relative bg-green-600/5">
        <div class="container-fluid relative">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                    <div class="text-center">
                        <a href="{{route('index')}}"><img src="{{asset('/images/logo-icon-64.png')}}" class="mx-auto" alt=""></a>
                    </div>
                    <div class="title-heading text-center my-auto">
                        <img src="{{asset('/images/error.png')}}" class="mx-auto" alt="">
                        <h1 class="mt-3 mb-6 md:text-4xl text-3xl font-bold">Page Not Found?</h1>
                        <p class="text-slate-400">Whoops, this is embarassing. <br> Looks like the page you were looking for wasn't found.</p>

                        <div class="mt-4">
                            <a href="{{route('index')}}" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md">Back to Home</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Design & Develop with  by <a href="https://kwlegaltech.com//" target="_blank" class="text-reset">kw legal tech</a>.</p>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
@endsection
