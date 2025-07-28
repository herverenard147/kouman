@extends('content.no-sidebar')
@section('title', 'Réinitialiser le mot de passe')
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
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1">
                        <form class="text-start" method="POST" action="{{ route('client.password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-4">
                                <label class="font-medium" for="email">Adresse Email :</label>
                                <input name="email" id="email" type="email" value="{{ old('email', $request->email) }}" class="form-input mt-3 w-full @error('email') border-red-500 @enderror" placeholder="name@example.com" required autofocus>
                                @error('email')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="password">Mot de passe :</label>
                                <input name="password" id="password" type="password" class="form-input mt-3 w-full @error('password') border-red-500 @enderror" placeholder="Mot de passe" required>
                                @error('password')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="password_confirmation">Confirmer le mot de passe :</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-input mt-3 w-full @error('password_confirmation') border-red-500 @enderror" placeholder="Confirmer le mot de passe" required>
                                @error('password_confirmation')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Réinitialiser le mot de passe</button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Vous vous souvenez de votre mot de passe ? </span>
                                <a href="{{ route('partenaire.login') }}" class="text-black font-medium">Se connecter</a>
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
</section>

@endsection
