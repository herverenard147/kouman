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
<section class="max-w-4xl mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6">Mon Profil Partenaire</h2>

    <div class="bg-white dark:bg-slate-900 shadow rounded-xl p-6 space-y-4">
        <!-- Photo -->
        <div class="flex items-center gap-4">
            @if($partenaire->image)
            <img src="{{ asset('storage/'.$partenaire->image) }}" class="w-24 h-24 rounded-full object-cover" alt="Profil">
            @else
            <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                <i data-feather="user"></i>
            </div>
            @endif
            <div>
                <h3 class="text-xl font-semibold">{{ $partenaire->nom_entreprise }}</h3>
                <p class="text-gray-500">{{ $partenaire->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="font-semibold">Nom entreprise :</label>
                <p>{{ $partenaire->nom_entreprise }}</p>
            </div>
            <div>
                <label class="font-semibold">Email :</label>
                <p>{{ $partenaire->email }}</p>
            </div>
            <div>
                <label class="font-semibold">Téléphone :</label>
                <p>{{ $partenaire->téléphone }}</p>
            </div>
            <div>
                <label class="font-semibold">Adresse :</label>
                <p>{{ $partenaire->adresse }}</p>
            </div>
            <div>
                <label class="font-semibold">Site Web :</label>
                <p>{{ $partenaire->siteWeb }}</p>
            </div>
            <div>
                <label class="font-semibold">Type :</label>
                <p>{{ $partenaire->type }}</p>
            </div>
            <div>
                <label class="font-semibold">Statut :</label>
                <p>{{ $partenaire->statut }}</p>
            </div>
            <div>
                <label class="font-semibold">Date d’inscription :</label>
                <p>{{ $partenaire->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <a href="{{ route('partenaire.profile.edit') }}" class="mt-6 inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
            Modifier mon profil
        </a>
    </div>
    <div class="mt-12 border-t pt-6">
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

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Mettre à jour le mot de passe
            </button>
        </form>
    </div>


    <!-- Bloc : Supprimer le compte -->
    <div class="mt-12 border-t pt-6">
        <h3 class="text-xl font-semibold text-red-600 mb-4">Clôturer mon compte</h3>
        <p class="text-gray-600 mb-4">Cette action est <strong>irréversible</strong>. Toutes vos données seront supprimées définitivement.</p>

        <form action="{{ route('partenaire.account.delete') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement votre compte ?');">
            @csrf
            @method('DELETE')

            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Supprimer mon compte
            </button>
        </form>
    </div>

</section>

@endsection