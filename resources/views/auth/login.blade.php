
@extends('content.no-sidebar')
@section( 'title', 'Login')
@section('content')

    <section class="min-h-screen flex items-center py-4 px-4 bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>

        <div class="relative z-10 w-full max-w-xl">
            <div class="bg-white shadow-md rounded-lg px-8 py-10">
                <div class="p-6">
                    <a href="{{route('login')}}">
                        <img src=" {{ asset('client/assets/images/d.ico') }}" class="inline-block" alt="">
                        <img src=" {{ asset('client/assets/images/d.ico') }}" class="hidden" alt="">
                    </a>
                    <h5 class="my-6 text-xl font-semibold">Se Connecter</h5>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
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
                    <form class="text-start" method="POST" action="{{ route('partenaire.login.store') }}">
                        @csrf
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="LoginEmail">Email:</label>
                                <input name="email" id="LoginEmail" type="email" class="form-input mt-3 @error('email') border-red-500 @enderror" placeholder="name@example.com">
                                @error('email')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="LoginPassword">Mot de passe:</label>
                                <input name="password" id="LoginPassword" type="password" class="form-input mt-3 @error('password') border-red-500 @enderror" placeholder="Password:">
                                @error('password')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input name="remember" class="form-checkbox rounded border-gray-200 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Se rappeler de moi</label>
                                </div>
                                <p class="text-slate-400 mb-0"><a href="{{route('partenaire.reset-password')}}" class="text-slate-400">Mot de passe oublié ?</a></p>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Connexion</button>
                            </div>
                            <div class="text-center">
                                <span class="text-slate-400 me-2">Vous n'avez pas de compte ?</span> <a href="{{route('partenaire.register.index')}}" class="text-black font-medium">Créer un compte</a>
                            </div>
                            @if ( Route::currentRouteName() !== 'partenaire.login' )
                                <div class="text-center">
                                    <span class="text-slate-400 me-2">Êtes vous un partenaire ?</span> <a href="{{route('partenaire.login')}}" class="text-black font-medium">Connectez-vous ici</a>
                                </div>


                            @endif

                        </div>
                    </form>
                </div>

                <div class="px-6 py-2 bg-slate-50 text-center">
                    <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Designed by <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">KW Legal & Tech</a>.</p>
                </div>
            </div>
        </div>
    </section><!--end section -->
@endsection
