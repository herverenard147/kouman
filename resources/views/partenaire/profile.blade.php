@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')

@section('title', 'Profil partenaire')

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
<div class="min-h-screen flex items-center justify-center py-16 px-4 bg-gray-100 dark:bg-slate-900">
    <div class="max-w-6xl w-full bg-white dark:bg-slate-900 rounded-lg shadow-xl p-8">
        <h1 class="text-4xl font-extrabold mb-10 text-black dark:text-white border-b-4 border-green-600 pb-2 text-center">
            Mon profil partenaire
        </h1>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Colonne gauche -->
            <div class="md:w-1/3 bg-green-50 dark:bg-slate-800 rounded-lg p-6 shadow-md flex flex-col items-center">
                @if($partenaire->image)
                    <img src="{{ asset('imageDes/uploads/'.$partenaire->image) }}" alt="Photo de profil" 
                         class="w-40 h-40 rounded-full object-cover shadow-lg mb-4 border-4 border-green-600">
                @else
                    <div class="w-40 h-40 rounded-full bg-gray-200 flex items-center justify-center shadow-lg mb-4 border-4 border-green-600">
                        <i data-feather="user" class="w-12 h-12 text-gray-500"></i>
                    </div>
                @endif
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">{{ $partenaire->nom_entreprise }}</h2>
                <p class="text-green-600 font-medium mb-4">{{ $partenaire->type }}</p>

                <ul class="w-full space-y-3 text-gray-700 dark:text-gray-300">
                    <li><strong>Email :</strong> {{ $partenaire->email }}</li>
                    <li><strong>Téléphone :</strong> {{ $partenaire->téléphone }}</li>
                    <li><strong>Adresse :</strong> {{ $partenaire->adresse }}</li>
                    <li><strong>Site Web :</strong> 
                        @if($partenaire->siteWeb)
                            <a href="{{ $partenaire->siteWeb }}" target="_blank" class="text-green-600 underline">
                                {{ $partenaire->siteWeb }}
                            </a>
                        @else
                            Non renseigné
                        @endif
                    </li>
                    <li><strong>Statut :</strong> {{ $partenaire->statut }}</li>
                    <li><strong>Date d’inscription :</strong> {{ $partenaire->created_at->format('d/m/Y') }}</li>
                </ul>
            </div>

            <!-- Colonne droite -->
            <div class="md:w-2/3 bg-gray-50 dark:bg-slate-800 rounded-lg p-6 shadow-md">
                <h3 class="text-2xl font-semibold text-black dark:text-white mb-4">
                    Bienvenue sur votre espace partenaire
                </h3>
                <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    Gérez vos informations personnelles, votre sécurité et vos préférences.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('partenaire.profile.edit') }}" 
                       class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow transition">
                        Modifier mon profil
                    </a>
                    <a href="#changer-mdp" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded shadow transition">
                        Changer mon mot de passe
                    </a>
                    <form action="{{ route('partenaire.account.delete') }}" method="POST" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement votre compte ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded shadow transition">
                            Supprimer mon compte
                        </button>
                    </form>
                </div>

                <!-- Bloc Changement de mot de passe -->
                <div id="changer-mdp" class="mt-8 pt-6 border-t">
                    <h3 class="text-xl font-semibold mb-4">Sécurité du compte</h3>

                    @if(session('password_success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('password_success') }}
                        </div>
                    @endif

                    @if(session('password_error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            {{ session('password_error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('partenaire.password.update') }}" method="POST" class="space-y-4 max-w-xl">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium">Mot de passe actuel</label>
                            <input type="password" name="current_password" class="form-input w-full" required>
                        </div>
                        <div>
                            <label class="block font-medium">Nouveau mot de passe</label>
                            <input type="password" name="new_password" class="form-input w-full" required>
                        </div>
                        <div>
                            <label class="block font-medium">Confirmer le nouveau mot de passe</label>
                            <input type="password" name="new_password_confirmation" class="form-input w-full" required>
                        </div>

                        <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Mettre à jour le mot de passe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
