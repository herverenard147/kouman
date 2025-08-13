@extends('layout.base')
@section('title', 'Modifier Partenaire')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 pt-16 pb-12">
    <div class="container-fluid relative px-3 dark:bg-slate-900 min-h-screen py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto bg-white dark:bg-slate-900 rounded shadow p-8">

                {{-- En-tête --}}
                <header class="mb-8">
                    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                        Modifier le partenaire
                    </h1>
                    <hr class="border-gray-300 dark:border-gray-700" />
                </header>

                {{-- Erreurs --}}
                @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded border border-red-300">
                    <ul class="list-disc pl-6 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Formulaire --}}
                <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nom_entreprise" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nom de l'entreprise <span class="text-red-500">*</span></label>
                        <input type="text" name="nom_entreprise" id="nom_entreprise" value="{{ old('nom_entreprise', $partner->nom_entreprise) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $partner->email) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                        <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $partner->telephone) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select name="type" id="type"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @php
                            $types = ['hotel', 'agence_voyage', 'compagnie_aerienne', 'residence', 'evenementiel'];
                            @endphp
                            @foreach ($types as $typeOption)
                            <option value="{{ $typeOption }}" {{ old('type', $partner->type) === $typeOption ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $typeOption)) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                        <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $partner->adresse) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="siteWeb" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Site web</label>
                        <input type="url" name="siteWeb" id="siteWeb" value="{{ old('siteWeb', $partner->siteWeb) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="statut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Statut</label>
                        <input type="text" name="statut" id="statut" value="{{ old('statut', $partner->statut) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    {{-- Photo profil --}}
                    <div>
                        <label for="photo_profil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Photo de profil</label>
                        <input type="file" name="photo_profil" id="photo_profil" class="w-full text-gray-700 dark:text-gray-300">
                        @if ($partner->photo_profil)
                        <img src="{{ asset('storage/' . $partner->photo_profil) }}" alt="Photo profil"
                            class="mt-4 w-28 h-28 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-semibold">
                            Mettre à jour
                        </button>
                        <a href="{{ route('admin.partners.index') }}" class="text-gray-600 hover:underline">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection