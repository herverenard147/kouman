@extends('layout.base')
@section('title', 'Modifier Partenaire')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen pt-16 pb-12">
    <div class="container mx-auto px-4 max-w-3xl py-16">

        {{-- En-tête avec titre + fil d'Ariane --}}
        <div class="md:flex justify-between items-center mb-8">
            <h5 class="text-lg font-semibold text-slate-900 dark:text-white">
                Modifier le partenaire
                <span class="text-blue-600 dark:text-blue-400">{{ $partner->nom_entreprise }}</span>
            </h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[16px] font-medium duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                    <a href="{{ route('admin.dashboard') }}">Afrique évasion</a>
                </li>
                <li class="inline-block text-base mx-0.5 ltr:rotate-0 rtl:rotate-180 text-gray-500 dark:text-gray-400">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Modifier Partenaire</li>
            </ul>
        </div>

        {{-- Messages d'erreur --}}
        @if ($errors->any())
        <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-400 px-4 py-2 rounded mb-6">
            <ul class="list-disc pl-6 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center w-full">
                <label for="photo_profil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Photo de profil</label>
                <input
                    type="file"
                    name="photo_profil"
                    id="photo_profil"
                    accept="image/jpeg,image/png,image/jpg"
                    class="w-full max-w-xs text-gray-700 dark:text-gray-300">
                @if ($partner->photo_profil)
                <img
                    src="{{ $partner->photo_profil ? asset('/imageDes/uploads/' . $partner->photo_profil) : asset('images/client/logouser2.png') }}"
                    alt="Photo profil"
                    class="mt-4 w-28 h-28 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                @endif
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="nom_entreprise" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nom de l'entreprise <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="nom_entreprise"
                        id="nom_entreprise"
                        value="{{ old('nom_entreprise', $partner->nom_entreprise) }}"
                        placeholder="Non renseigné"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nom_entreprise') border-red-500 @enderror">
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $partner->email) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                </div>

                <div>
                    <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input
                        type="text"
                        name="telephone"
                        id="telephone"
                        value="{{ old('telephone', $partner->telephone) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('telephone') border-red-500 @enderror">
                </div>

                <div>
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                    <select
                        name="type"
                        id="type"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('type') border-red-500 @enderror">
                        @php
                        $types = ['hotel', 'agence_voyage', 'compagnie_aerienne', 'residence', 'evenementiel'];
                        @endphp
                        <option value="" disabled>-- Sélectionner un type --</option>
                        @foreach ($types as $typeOption)
                        <option value="{{ $typeOption }}" {{ old('type', $partner->type) === $typeOption ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $typeOption)) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                    <input
                        type="text"
                        name="adresse"
                        id="adresse"
                        value="{{ old('adresse', $partner->adresse) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('adresse') border-red-500 @enderror">
                </div>

                <div>
                    <label for="siteWeb" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Site web</label>
                    <input
                        type="url"
                        name="siteWeb"
                        id="siteWeb"
                        value="{{ old('siteWeb', $partner->siteWeb) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('siteWeb') border-red-500 @enderror">
                </div>
            </div>
            <div class="mt-6">
                <label for="statut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Statut
                </label>
                <input
                    type="text"
                    name="statut"
                    id="statut"
                    value="{{ old('statut', $partner->statut) }}"
                    placeholder="Non renseigné"
                    class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('statut') border-red-500 @enderror">
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
                    Mettre à jour
                </button>
                <a href="{{ route('admin.partners.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection