@extends('layouts.app')

@include('client.Base.style.no-header')

@section('title', 'Auth-Signup - Hously')
@section('content')
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">

        <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{ asset('client/assets/images/bg/01.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="/index"><img src="client/assets/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Signup</h5>
                    <form class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterName">Your Name:</label>
                                <input id="RegisterName" type="text" class="form-input mt-3" placeholder="Harry">
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input id="LoginEmail" type="email" class="form-input mt-3"
                                    placeholder="name@example.com">
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">Password:</label>
                                <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="Password:">
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center mb-0">
                                    <input
                                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                                        type="checkbox" value="" id="AcceptT&C">
                                    <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a
                                            href="" class="text-green-600">Terms And Condition</a></label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <a href=""
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Register</a>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Already have an account ? </span> <a href="/auth-login"
                                    class="text-black dark:text-white font-bold">Sign in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->
@endsection
