
@extends('content.no-sidebar', [
    'title' => 'Thank You',
    'description' => 'Thank you for your submission. We appreciate your interest and will get back to you soon.',
    'keywords' => 'thank you, submission, appreciation, real estate, properties',
    'canonical' => url()->current(),
])
@section('title', 'Thank You')
@section('content')

    <!-- Start -->
    <section class="relative h-screen flex items-center justify-center text-center bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="title-heading text-center my-auto">
                    <div class="size-24 bg-green-600/5 text-green-600 rounded-md flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                        <i data-feather="thumbs-up" class="size-10"></i>
                    </div>
                    <h1 class="mt-6 mb-8 md:text-5xl text-3xl font-bold">Thank You</h1>
                    <p class="text-slate-400 max-w-xl mx-auto">We are a huge marketplace dedicated to connecting great artists of all Koumanwith their fans and unique token collectors!</p>

                    <div class="mt-6">
                        <a href="{{route('index')}}" class="btn bg-green-600/5 hover:bg-green-600 border-green-600/10 hover:border-green-600 text-green-600 hover:text-white rounded-md">Back to Home</a>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

@endsection
