@extends('content.no-sidebar')

@section('title', 'Modifier mon compte')
@extends('client.base.style.base')
@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Parametre du Compte</h3>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
                Gérez vos informations personnelles, votre sécurité et vos préférences
            </p>
        </div>
    </div>
</section>
<div class="relative">
    <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->
<div class="min-h-screen bg-white dark:bg-slate-900 dark:from-slate-900 dark:to-slate-800 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Colonne de gauche - Profil -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Carte Profil -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="relative group">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-blue-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-md"></div>
                                <div class="relative h-32 w-32 rounded-full ring-4 ring-white dark:ring-slate-700 shadow-lg overflow-hidden">
                                    <img src="{{ Auth::user()->photo ? asset('uploads/users/' . Auth::user()->photo) : asset('/images/client/default.jpg') }}"
                                        class="h-full w-full object-cover"
                                        id="profile-image"
                                        alt="Photo de profil">
                                    <label for="pro-img" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </label>
                                    <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                </h3>
                                <p class="text-lg text-gray-500 dark:text-gray-400 mt-1">
                                    {{ Auth::user()->email }}
                                </p>
                                <div class="mt-3 flex justify-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        Compte vérifié
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation secondaire -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden">
                    <nav class="space-y-1 p-4">
                        <a href="#personal-info" class="flex items-center px-4 py-3 text-lg font-medium text-gray-900 dark:text-white rounded-lg bg-gray-50 dark:bg-slate-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-500 group-hover:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informations personnelles
                        </a>
                        <a href="#password" class="flex items-center px-4 py-3 text-lg font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-400 group-hover:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Mot de passe
                        </a>
                        <a href="#danger-zone" class="flex items-center px-4 py-3 text-lg font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-400 group-hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Zone dangereuse
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Colonne de droite - Contenu principal -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Section Informations personnelles -->
                <div id="personal-info" class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="px-8 py-6 border-b border-gray-200 dark:border-slate-700">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Détails personnels
                        </h2>
                    </div>
                    <div class="p-8">
                        <form method="POST" action="{{ route('client.update') }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="grid md:grid-cols-2 gap-8">
                                <!-- Prénom -->
                                <div>
                                    <label for="prenom" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Prénom</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input id="prenom" type="text" name="prenom" value="{{ old('prenom', $client->prenom) }}"
                                            class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                            placeholder="Votre prénom" required>
                                    </div>
                                </div>

                                <!-- Nom -->
                                <div>
                                    <label for="nom" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Nom</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input id="nom" type="text" name="nom" value="{{ old('nom', $client->nom) }}"
                                            class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                            placeholder="Votre nom" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Email</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input id="email" type="email" name="email" value="{{ old('email', $client->email) }}"
                                            class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                            placeholder="Votre email" required>
                                    </div>
                                </div>

                                <!-- Téléphone -->
                                <div>
                                    <label for="telephone" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Téléphone</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input id="telephone" type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}"
                                            class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                            placeholder="Votre téléphone">
                                    </div>
                                </div>

                                <!-- Adresse -->
                                <div class="md:col-span-2">
                                    <label for="adresse" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Adresse</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <input id="adresse" type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}"
                                            class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                            placeholder="Votre adresse complète">
                                    </div>
                                </div>

                                <!-- Ville -->
                                <div>
                                    <label for="ville" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Ville</label>
                                    <input id="ville" type="text" name="ville" value="{{ old('ville', $client->ville) }}"
                                        class="block w-full px-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200"
                                        placeholder="Votre ville">
                                </div>

                                <!-- Code postal -->
                                <div>
                                    <label for="code_postal" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Code postal</label>
                                    <input id="code_postal" type="text" name="code_postal" value="{{ old('code_postal', $client->code_postal) }}"
                                        class="block w-full px-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200"
                                        placeholder="Code postal">
                                </div>

                                <!-- Pays -->
                                <div>
                                    <label for="pays" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Pays</label>
                                    <select id="pays" name="pays"
                                        class="block w-full px-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200">
                                        <option value="">Sélectionnez un pays</option>
                                        <option value="Côte d'Ivoire" {{ old('pays', $client->pays) === "Côte d'Ivoire" ? 'selected' : '' }}>Côte d'Ivoire</option>
                                        <option value="France" {{ old('pays', $client->pays) === 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Belgique" {{ old('pays', $client->pays) === 'Belgique' ? 'selected' : '' }}>Belgique</option>
                                        <option value="Suisse" {{ old('pays', $client->pays) === 'Suisse' ? 'selected' : '' }}>Suisse</option>
                                        <option value="Canada" {{ old('pays', $client->pays) === 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <!-- Ajouter d'autres pays -->
                                    </select>
                                </div>

                                <!-- Genre -->
                                <div>
                                    <label for="genre" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Genre</label>
                                    <select id="genre" name="genre"
                                        class="block w-full px-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200">
                                        <option value="">Non spécifié</option>
                                        <option value="homme" {{ old('genre', $client->genre) === 'homme' ? 'selected' : '' }}>Homme</option>
                                        <option value="femme" {{ old('genre', $client->genre) === 'femme' ? 'selected' : '' }}>Femme</option>
                                        <option value="autre" {{ old('genre', $client->genre) === 'autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>

                                <!-- Langue préférée -->
                                <div>
                                    <label for="langue_preferee" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Langue préférée</label>
                                    <select id="langue_preferee" name="langue_preferee"
                                        class="block w-full px-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm transition duration-200">
                                        <option value="fr" {{ old('langue_preferee', $client->langue_preferee) === 'fr' ? 'selected' : '' }}>Français</option>
                                        <option value="en" {{ old('langue_preferee', $client->langue_preferee) === 'en' ? 'selected' : '' }}>Anglais</option>
                                        <option value="es" {{ old('langue_preferee', $client->langue_preferee) === 'es' ? 'selected' : '' }}>Espagnol</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="w-full md:w-auto flex justify-center items-center px-8 py-4 border border-transparent text-lg font-medium rounded-xl shadow-sm text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Section Mot de passe -->
                <div id="password" class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="px-8 py-6 border-b border-gray-200 dark:border-slate-700">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Sécurité du compte
                        </h2>
                    </div>
                    <div class="p-8">
                        @if (session('success'))
                        <div class="mb-8 p-4 rounded-lg bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <h3 class="text-lg font-medium text-green-800 dark:text-green-200">{{ session('success') }}</h3>
                            </div>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="mb-8 p-4 rounded-lg bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                                <h3 class="text-lg font-medium text-red-800 dark:text-red-200">Erreurs de validation</h3>
                            </div>
                            <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('client.updatePassword') }}" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <!-- Ancien mot de passe -->
                            <div>
                                <label for="old_password" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Ancien mot de passe</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input id="old_password" type="password" name="old_password" required
                                        class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="Votre mot de passe actuel">
                                </div>
                            </div>

                            <!-- Nouveau mot de passe -->
                            <div>
                                <label for="new_password" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Nouveau mot de passe</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input id="new_password" type="password" name="new_password" required
                                        class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="Votre nouveau mot de passe">
                                </div>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Minimum 8 caractères avec des chiffres et symboles</p>
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div>
                                <label for="new_password_confirmation" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-3">Confirmer le mot de passe</label>
                                <div class="relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input id="new_password_confirmation" type="password" name="new_password_confirmation" required
                                        class="block w-full pl-12 pr-5 py-4 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="Confirmer votre nouveau mot de passe">
                                </div>
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="w-full md:w-auto flex justify-center items-center px-8 py-4 border border-transparent text-lg font-medium rounded-xl shadow-sm text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Mettre à jour le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Section Zone dangereuse -->
                <div id="danger-zone" class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden border-2 border-red-200 dark:border-red-900/50">
                    <div class="px-8 py-6 border-b border-red-200 dark:border-red-900/50 bg-red-50 dark:bg-red-900/10">
                        <h2 class="text-2xl font-bold text-red-800 dark:text-red-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Zone dangereuse
                        </h2>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Supprimer le compte</h3>
                                <p class="text-gray-600 dark:text-gray-400">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.</p>
                            </div>

                            <form method="POST" action="{{ route('client.deleteAccount') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md px-8 py-3"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour la confirmation de suppression -->
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('#danger-zone form').submit();
            }
        });
    }

    function loadFile(event) {
        const output = document.getElementById('profile-image');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src);
        }
    }
</script>

@endsection