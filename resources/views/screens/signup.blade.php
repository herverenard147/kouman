@extends('content.no-sidebar')
@section('title', 'Signup')
@section('content')
    <section class="h-screen flex items-center justify-center relative overflow-hidden bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
                <div class="relative overflow-hidden bg-white shadow-md rounded-md">
                    <div class="p-6">
                        <a href="">
                            <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto block" alt="">
                            <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto hidden" alt="">
                        </a>
                        <h5 class="my-6 text-xl font-semibold">Signup</h5>
                        <form class="text-start">
                            <div class="grid grid-cols-1">
                                <div class="mb-4">
                                    <label class="font-semibold" for="RegisterName">Your Name:</label>
                                    <input id="RegisterName" type="text" class="form-input mt-3" placeholder="Harry">
                                </div>

                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                    <input id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com">
                                </div>

                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginPassword">Password:</label>
                                    <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="Password:">
                                </div>

                                <div class="mb-4">
                                    <div class="flex items-center mb-0">
                                        <input class="form-checkbox rounded border-gray-200 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="AcceptT&C">
                                        <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a href="" class="text-green-600">Terms And Condition</a></label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Register</a>
                                </div>

                                <div class="text-center">
                                    {{-- <span class="text-slate-400 me-2">Already have an account ? </span> <a href="{{route('login')}}" class="text-black font-medium">Sign in</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="px-6 py-2 bg-slate-50 text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Africa Évasion. Conception et Developper par <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">Kw Legal & Tech</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section -->
@endsection

