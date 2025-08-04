@extends('content.no-sidebar')
@section('title', 'Reset Password')
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
                        <h5 class="my-6 text-xl font-semibold">Modifier votre mot de passe</h5>
                        @if(session('status'))
                            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="grid grid-cols-1">
                            <p class="text-slate-400 mb-6">Veuillez saisir votre adresse e-mail. Vous recevrez un lien pour créer un nouveau mot de passe par e-mail.</p>
                            <form class="text-start" method="POST" action="{{route('client.password.email')}}">
                                @csrf
                                <div class="grid grid-cols-1">
                                    <div class="mb-4">
                                        <label class="font-medium" for="LoginEmail">Addresse Email :</label>
                                        <input name="email" id="LoginEmail" type="email" class="form-input mt-3" placeholder="name@example.com">
                                    </div>
                                    @error('email')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-4">
                                        <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Envoyer</button>

                                        {{-- <a href="{{route('partenaire.reset-password.store')}}" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Envoyer</a> --}}
                                    </div>

                                    <div class="text-center">
                                        <span class="text-slate-400 me-2">Vous vous souvenez de votre mot de passe ? </span><a href="{{route('partenaire.login')}}" class="text-black font-medium">Sign in</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="px-6 py-2 bg-slate-50 text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Designed by <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">KW Legal & Tech</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section -->

@endsection
