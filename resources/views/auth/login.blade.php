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
                            <div class="mb-4 relative">
                                <label for="LoginPassword" class="font-medium text-slate-700 dark:text-white">Mot de passe :</label>

                                <input name="password" id="LoginPassword" type="password"
                                    class="form-input mt-3 pr-12 bg-white dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 @error('password') border-red-500 @enderror"
                                    placeholder="Mot de passe">

                                <!-- Icônes œil -->
                                <button type="button" onclick="togglePasswordVisibility()"
                                        class="absolute right-3 top-11 text-slate-600 dark:text-slate-400 focus:outline-none">
                                    <!-- Œil visible -->
                                    <svg id="eyeVisible" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                    </svg>

                                    <!-- Œil barré (masqué au début) -->
                                    <svg id="eyeHidden" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.07-4.568"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 01-4.243-4.243"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3l18 18"/>
                                    </svg>
                                </button>

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

                <div class="px-6 py-2  text-center">
                    <p class="mb-0 text-slate-600 dark:text-slate-400">
                        © <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech.
                        Conception et développement par <br> <a href="https://kwlegaltech.com/" target="_blank" class="text-green-600 dark:text-green-400 hover:underline">KW Legal & Tech</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            function togglePasswordVisibility() {
                const input = document.getElementById('LoginPassword');
                const eyeVisible = document.getElementById('eyeVisible');
                const eyeHidden = document.getElementById('eyeHidden');

                if (input.type === 'password') {
                    input.type = 'text';
                    eyeVisible.classList.add('hidden');
                    eyeHidden.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eyeVisible.classList.remove('hidden');
                    eyeHidden.classList.add('hidden');
                }
            }
        </script>
    @endpush
@endsection
