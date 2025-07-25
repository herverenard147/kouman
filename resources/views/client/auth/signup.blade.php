@extends('client.base.style.no-header')
@section('title', 'Inscription')

@section('content')
    <section class="min-h-screen py-2 flex items-center justify-center relative overflow-hidden zoom-image">
        <!-- Background image -->
        <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{ asset('client/assets/images/bg/01.jpg') }}');">
        </div>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>

        <!-- Form wrapper -->
        <div class="container relative z-3 my-4">
            <div class="flex justify-center">
                <div class="max-w-[750px] w-full m-auto p-10 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="{{ route('client.index') }}">
                        <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto w-20 h-auto" alt="Logo">
                    </a>

                    <h5 class="my-6 text-xl font-semibold text-center text-gray-800 dark:text-white">Créer un compte client</h5>

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

                    <form method="POST" action="{{ route('client.auth.signup.store') }}" enctype="multipart/form-data" class="text-start">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nom -->
                            <div class="mb-4">
                                <label class="font-semibold" for="nom">Nom :</label>
                                <input name="nom" id="nom" type="text" class="form-input mt-3" placeholder="Doe" required>
                            </div>

                            <!-- Prénom -->
                            <div class="mb-4">
                                <label class="font-semibold" for="prenom">Prénom :</label>
                                <input name="prenom" id="prenom" type="text" class="form-input mt-3" placeholder="Jean" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="font-semibold" for="email">Adresse email :</label>
                                <input name="email" id="email" type="email" class="form-input mt-3" placeholder="nom@exemple.com" required>
                            </div>

                            <!-- Téléphone -->
                            <div class="mb-4">
                                <label class="font-semibold" for="telephone">Téléphone :</label>
                                <input name="telephone" id="telephone" type="text" class="form-input mt-3" placeholder="+2250700000000">
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-4 relative">
                                <label for="LoginPassword" class="font-medium text-slate-700 dark:text-white">Mot de passe :</label>

                                <input name="password" id="LoginPassword" type="password"
                                    class="form-input mt-3 pr-12 bg-white dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 @error('password') border-red-500 @enderror"
                                    placeholder="Mot de passe">

                                <!-- Bouton -->
                                <button type="button"
                                    onclick="togglePasswordVisibility('LoginPassword', 'eyeVisible1', 'eyeHidden1')"
                                    class="absolute right-3 top-11 text-slate-600 dark:text-slate-400 focus:outline-none">

                                    <svg id="eyeVisible1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                    </svg>

                                    <svg id="eyeHidden1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.07-4.568"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 01-4.243-4.243"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>


                            <!-- Confirmation -->
                            <div class="mb-4 relative">
                                <label for="password_confirmation" class="font-medium text-slate-700 dark:text-white">Mot de passe :</label>

                                <input name="password_confirmation" id="password_confirmation" type="password"
                                    class="form-input mt-3 pr-12 bg-white dark:bg-slate-800 dark:text-white dark:placeholder-slate-500 @error('password') border-red-500 @enderror"
                                    placeholder="Confirmez votre Mot de passe">

                                <!-- Icônes œil -->
                                <button type="button"
                                    onclick="togglePasswordVisibility1('password_confirmation', 'eyeVisible2', 'eyeHidden2')"
                                    class="absolute right-3 top-11 text-slate-600 dark:text-slate-400 focus:outline-none">

                                    <svg id="eyeVisible2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                    </svg>

                                    <svg id="eyeHidden2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
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
                            {{-- <div class="mb-4">
                                <label class="font-semibold" for="password_confirmation">Confirmez :</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-input mt-3" required>
                            </div> --}}

                            <!-- Genre -->
                            <div class="mb-4">
                                <label class="font-semibold" for="genre">Genre :</label>
                                <select name="genre" id="genre" class="form-input mt-3">
                                    <option value="">-- Sélectionnez votre genre --</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>

                            <!-- Date de naissance -->
                            <div class="mb-4">
                                <label for="date_naissance" class="font-semibold block mb-2">Date de naissance :</label>
                                <input type="date" id="date_naissance" name="date_naissance"
                                    class="form-input mt-3"
                                    placeholder="Sélectionnez votre date de naissance" autocomplete="off">
                            </div>

                            <!-- Pays -->
                            <div class="mb-4">
                                <label class="font-semibold" for="pays">Pays :</label>
                                <input name="pays" id="pays" type="text" class="form-input mt-3" placeholder="Côte d'Ivoire">
                            </div>

                            <!-- Adresse -->
                            <div class="mb-4">
                                <label class="font-semibold" for="adresse">Adresse :</label>
                                <input name="adresse" id="adresse" type="text" class="form-input mt-3" placeholder="Côte d'Ivoire">
                            </div>

                            <!-- Ville -->
                            <div class="mb-4">
                                <label class="font-semibold" for="ville">Ville :</label>
                                <input name="ville" id="ville" type="text" class="form-input mt-3" placeholder="Abidjan">
                            </div>

                            <!-- Code postal -->
                            <div class="mb-4">
                                <label class="font-semibold" for="code_postal">Code postal :</label>
                                <input name="code_postal" id="code_postal" type="text" class="form-input mt-3" placeholder="22500">
                            </div>

                            <!-- Langue préférée -->
                            {{-- <div class="mb-4">
                                <label class="font-semibold" for="langue_preferee">Langue :</label>
                                <input name="langue_preferee" id="langue_preferee" type="text" class="form-input mt-3" placeholder="fr">
                            </div> --}}

                            <!-- Photo de profil -->
                            <div class="mb-4 ">
                                <label class="font-semibold" for="photo_profil">Photo de profil :</label>
                                <input name="photo_profil" id="photo_profil" type="file" class="form-input mt-3">
                            </div>
                        </div>
                        <!-- Conditions d'utilisation -->
                        <div class="mb-4">
                            <div class="flex items-center">
                                <input name="accept" class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 me-2" type="checkbox" required>
                                <label class="form-check-label text-slate-400" for="accept">
                                    J'accepte les <a href="{{ route('client.terms') }}" class="text-green-600">conditions générales</a>
                                </label>
                            </div>
                        </div>


                        <!-- Bouton -->
                        <div class="mb-4">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">S'inscrire</button>
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Vous avez déjà un compte ?</span>
                            <a href="{{ route('client.auth.login') }}" class="text-black dark:text-white font-bold">Se connecter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function togglePasswordVisibility(inputId, eyeVisibleId, eyeHiddenId) {
                const input = document.getElementById(inputId);
                const eyeVisible = document.getElementById(eyeVisibleId);
                const eyeHidden = document.getElementById(eyeHiddenId);

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

            function togglePasswordVisibility1(inputId, eyeVisibleId, eyeHiddenId) {
                const input = document.getElementById(inputId);
                const eyeVisible = document.getElementById(eyeVisibleId);
                const eyeHidden = document.getElementById(eyeHiddenId);

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

            flatpickr("#date_naissance", {
                dateFormat: "Y-m-d",
                maxDate: "today",
                altInput: true,
                altFormat: "d F Y",
                locale: "fr"
            });
        </script>
    @endpush

@endsection
