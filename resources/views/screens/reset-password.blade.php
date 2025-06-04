@extends('content.no-sidebar')
@section('title', 'Reset Password')
@section('content')


    <section class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
                <div class="relative overflow-hidden bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <div class="p-6">
                        <a href="">
                            <img src="{{ asset('images/logo-dark.png') }}" class="mx-auto block dark:hidden" alt="">
                            <img src="{{ asset('images/logo-light.png') }}" class="mx-auto dark:block hidden" alt="">
                        </a>
                        <h5 class="my-6 text-xl font-semibold">Reset Your Password</h5>
                        <div class="grid grid-cols-1">
                            <p class="text-slate-400 mb-6">Please enter your email address. You will receive a link to create a new password via email.</p>
                            <form class="text-start">
                                <div class="grid grid-cols-1">
                                    <div class="mb-4">
                                        <label class="font-medium" for="LoginEmail">Email Address:</label>
                                        <input id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com">
                                    </div>

                                    <div class="mb-4">
                                        <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Send</a>
                                    </div>

                                    <div class="text-center">
                                        <span class="text-slate-400 me-2">Remember your password ? </span><a href="login.php" class="text-black dark:text-white font-medium">Sign in</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="px-6 py-2 bg-slate-50 dark:bg-slate-800 text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Hously. Designed by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section -->

@endsection
