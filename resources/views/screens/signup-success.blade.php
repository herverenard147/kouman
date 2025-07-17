@extends('content.no-sidebar')
@section('title', 'Signup-Success')
@section('content')

    <!-- Start Hero -->
    <section class="relative h-screen flex justify-center items-center bg-slate-50">
        <div class="container">
            <div class="md:flex justify-center">
                <div class="lg:w-2/5">
                    <div class="relative overflow-hidden rounded-md bg-white shadow">
                        <div class="px-6 py-12 bg-green-600 text-center">
                            <i class="mdi mdi-check-circle-outline text-white text-8xl"></i>
                            <h5 class="text-white text-xl tracking-wide uppercase font-semibold mt-2">Success</h5>
                        </div>

                        <div class="px-6 py-12 text-center">
                            <p class="text-black font-semibold text-xl">Congratulations! 🎉</p>
                            <p class="text-slate-400 mt-4">Your account has been successfully created. <br> Enjoy your journey. Thank you</p>

                            <div class="mt-6">
                                <a href="{{route('index')}}" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-greenbg-green-700 text-white rounded-md">Continue</a>
                            </div>
                        </div>

                        <div class="text-center p-6 border-t border-gray-100">
                            <p class="mb-0 text-slate-400 font-medium">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Design & Develop with  by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
@endsection
