@extends('client.base.style.no-header')
@section('title', 'Se connecter')

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
                    <a href="{{route('client.auth.login')}}"><img src="{{asset('client/assets/images/logoG.ico')}}" class="mx-auto"
                            alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Se Connecter en tant que Admin</h5>
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
                    <form class="text-start" action="{{route('admin.auth.login.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="LoginEmail">Email :</label>
                                <input id="LoginEmail" name="email" type="email" class="form-input mt-3"
                                    placeholder="name@example.com">
                            </div>

                            <div class="mb-4 relative">
                                <label for="LoginPassword" class="font-medium text-slate-700 dark:text-white">Mot de passe : ( minimum 8 caractères)</label>

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

                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input
                                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                                        type="checkbox" value="" name="remember" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Se rappelez de moi</label>
                                </div>
                                <p class="text-slate-400 mb-0"><a href="{{route('client.auth.re.password')}}" class="text-slate-400">Mot
                                        de passe oublié ?</a></p>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Connexion</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

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
