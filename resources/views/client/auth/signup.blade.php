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
                            <div class="mb-4">
                                <label class="font-semibold" for="password">Mot de passe :</label>
                                <input name="password" id="password" type="password" class="form-input mt-3" placeholder="********" required>
                            </div>

                            <!-- Confirmation -->
                            <div class="mb-4">
                                <label class="font-semibold" for="password_confirmation">Confirmez :</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-input mt-3" required>
                            </div>

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

    @push('script')
        <script>
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
