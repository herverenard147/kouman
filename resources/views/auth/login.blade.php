@extends('content.no-sidebar')
@section('title', 'Login')
@section('content')

<section class="min-h-screen flex items-center py-4 px-4 bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>

    <div class="relative z-10 w-full max-w-xl">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded-lg px-8 py-10">
            <div class="p-6">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto" alt="Logo">
                </a>
                <h5 class="my-6 text-xl font-semibold text-slate-900 dark:text-white">Se Connecter</h5>

                @if(session('success'))
                    <div class="bg-green-100 dark:bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 dark:bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('partenaire.login.store') }}" class="text-start">
                    @csrf
                    <div class="grid grid-cols-1">
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="LoginEmail" class="font-medium text-slate-700 dark:text-white">Email :</label>
                            <input name="email" id="LoginEmail" type="email"
                                   class="form-input mt-3 bg-white dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 @error('email') border-red-500 @enderror"
                                   placeholder="name@example.com">
                            @error('email')
                                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="LoginPassword" class="font-medium text-slate-700 dark:text-white">Mot de passe :</label>
                            <input name="password" id="LoginPassword" type="password"
                                   class="form-input mt-3 bg-white dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 @error('password') border-red-500 @enderror"
                                   placeholder="Mot de passe">
                            @error('password')
                                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember / Forgot -->
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <input id="RememberMe" name="remember" type="checkbox"
                                       class="form-checkbox rounded border-gray-200 dark:border-gray-700 text-green-600 focus:ring-green-200 me-2">
                                <label for="RememberMe" class="text-slate-600 dark:text-slate-300">Se rappeler de moi</label>
                            </div>
                            <p class="mb-0">
                                <a href="{{ route('partenaire.reset-password') }}" class="text-slate-600 dark:text-slate-300 hover:underline">
                                    Mot de passe oublié ?
                                </a>
                            </p>
                        </div>

                        <!-- Submit -->
                        <div class="mb-4">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">
                                Connexion
                            </button>
                        </div>

                        <!-- Register link -->
                        <div class="text-center">
                            <span class="text-slate-600 dark:text-slate-300 me-2">Vous n'avez pas de compte ?</span>
                            <a href="{{ route('partenaire.register.index') }}" class="text-black dark:text-white font-medium hover:underline">Créer un compte</a>
                        </div>

                        <!-- Partner login -->
                        @if (Route::currentRouteName() !== 'partenaire.login')
                            <div class="text-center mt-2">
                                <span class="text-slate-600 dark:text-slate-300 me-2">Êtes-vous un partenaire ?</span>
                                <a href="{{ route('partenaire.login') }}" class="text-black dark:text-white font-medium hover:underline">Connectez-vous ici</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>

            <div class="px-6 py-2 bg-slate-50 dark:bg-slate-800 text-center">
                <p class="mb-0 text-slate-600 dark:text-slate-400">
                    © <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech.
                    Designed by <a href="https://kwlegaltech.com/" target="_blank" class="text-green-600 dark:text-green-400 hover:underline">KW Legal & Tech</a>.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
