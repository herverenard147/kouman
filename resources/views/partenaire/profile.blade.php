@extends('layout.base')

@section('title', 'Profil utilisateur')

@section('content')
<div class="md:flex justify-between items-center">
    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Tous vos elements</h5>

    <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
        <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600 dark:hover:text-green-500"><a href="{{route('index')}}" class="text-gray-600 dark:text-gray-300">Afrique évasion</a></li>
        <li class="inline-block text-base text-slate-950 dark:text-gray-400 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
        <li class="inline-block capitalize text-[16px] font-medium text-green-600 dark:text-green-500" aria-current="page">Properties</li>
    </ul>
</div>
<div class="min-h-screen flex items-center justify-center py-16 px-4 bg-gray-100 dark:bg-slate-900">
    <div class="max-w-6xl w-full bg-white dark:bg-slate-900 rounded-lg shadow-xl p-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Colonne gauche -->
            <div class="md:w-1/3 bg-green-50 dark:bg-slate-800 rounded-lg p-6 shadow-md flex flex-col items-center">
                @if($partenaire->photo_profil)
                <img src="{{ asset('imageDes/uploads/'.$partenaire->photo_profil) }}" alt="Photo de profil"
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
                    <h3 class="text-xl font-semibold mb-4 text-white">Sécurité du compte</h3>

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

                    <form action="{{ route('partenaire.password.update') }}" method="POST" class="space-y-4 max-w-xl text-white">
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
