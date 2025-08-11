@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')
@section('title', 'Modifier le profil')

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
    <h2 class="text-2xl font-bold mb-6">Modifier mon Profil</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('partenaire.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-slate-900 p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <!-- Image -->
        <div>
            <label class="block font-semibold mb-1">Photo de profil</label>
            @if($partenaire->image)
                <img src="{{ asset('imageDes/uploads/'.$partenaire->image) }}" class="w-24 h-24 rounded-full object-cover mb-2" alt="Profil">
            @endif
            <input type="file" name="image" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm p-2">
        </div>

        <!-- Nom entreprise -->
        <div>
            <label class="block font-semibold mb-1">Nom entreprise</label>
            <input type="text" name="nom_entreprise" value="{{ old('nom_entreprise', $partenaire->nom_entreprise) }}" class="form-input w-full" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $partenaire->email) }}" class="form-input w-full" required>
        </div>

        <!-- Téléphone -->
        <div>
            <label class="block font-semibold mb-1">Téléphone</label>
            <input type="text" name="telephone" value="{{ old('telephone', $partenaire->téléphone) }}" class="form-input w-full">
        </div>

        <!-- Adresse -->
        <div>
            <label class="block font-semibold mb-1">Adresse</label>
            <input type="text" name="adresse" value="{{ old('adresse', $partenaire->adresse) }}" class="form-input w-full">
        </div>

        <!-- Site Web -->
        <div>
            <label class="block font-semibold mb-1">Site Web</label>
            <input type="url" name="siteWeb" value="{{ old('siteWeb', $partenaire->siteWeb) }}" class="form-input w-full">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Enregistrer les modifications
            </button>
            <a href="{{ route('partenaire.profile') }}" class="ml-4 text-gray-600 hover:underline">
                Annuler
            </a>
        </div>
    </form>
</section>
@endsection
