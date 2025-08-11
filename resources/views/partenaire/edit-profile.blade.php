@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')

@section('title', 'Modifier le profil')

@section('content')
<!-- Hero -->
<section class="relative w-full py-28 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative text-center text-white">
        <h1 class="text-4xl font-extrabold">Paramètres du Compte</h1>
        <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-300">
            Gérez vos informations personnelles et vos préférences en toute simplicité.
        </p>
    </div>
</section>
<div class="relative">
    <div class="shape overflow-hidden text-white dark:text-slate-900">
        <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H2880V0H2160C1440 48 720 0 0 0V48Z" fill="currentColor" />
        </svg>
    </div>
</div>

<!-- Main -->
<section class="max-w-6xl mx-auto py-12 px-4">
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-lg border border-gray-200 dark:border-slate-700 overflow-hidden">
        <div class="grid md:grid-cols-3">

            <!-- Profil -->
            <div class="bg-gray-50 dark:bg-slate-800 p-6 flex flex-col items-center justify-center">
                <div class="relative">
                    @if($partenaire->image)
                    <img src="{{ asset('imageDes/uploads/'.$partenaire->image) }}" alt="Profil"
                        class="w-32 h-32 rounded-full object-cover border-4 border-green-500 shadow">
                    @else
                    <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-slate-700 flex items-center justify-center border-4 border-green-500 shadow">
                        <i data-feather="user" class="w-12 h-12 text-gray-500"></i>
                    </div>
                    @endif
                    <label class="absolute bottom-0 right-0 bg-green-600 hover:bg-green-700 p-2 rounded-full cursor-pointer shadow">
                        <input type="file" name="image" class="hidden">
                        <i data-feather="camera" class="w-4 h-4 text-white"></i>
                    </label>
                </div>
                <h3 class="mt-4 text-xl font-bold text-gray-800 dark:text-white">{{ $partenaire->nom_entreprise ?? 'Nom Entreprise' }}</h3>
                <p class="text-gray-500 text-sm">{{ $partenaire->email ?? 'email@example.com' }}</p>
            </div>

            <!-- Formulaire -->
            <div class="col-span-2 p-8">
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('partenaire.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @foreach([
                    'nom_entreprise' => 'Nom entreprise',
                    'email' => 'Email',
                    'telephone' => 'Téléphone',
                    'adresse' => 'Adresse',
                    'siteWeb' => 'Site Web'
                    ] as $name => $label)
                    <div>
                        <label class="block font-semibold mb-1 text-gray-700 dark:text-gray-300">{{ $label }}</label>
                        <input type="{{ $name === 'email' ? 'email' : ($name === 'siteWeb' ? 'url' : 'text') }}"
                            name="{{ $name }}"
                            value="{{ old($name, $partenaire->{$name} ?? '') }}"
                            class="form-input w-full border-gray-300 dark:border-slate-600 rounded-lg shadow-sm p-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    @endforeach

                    <div class="pt-4 flex gap-4">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium shadow transition">
                            Enregistrer
                        </button>
                        <a href="{{ route('partenaire.profile') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-medium shadow transition">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection