@extends('layout.base')
@section('title', 'Modifier Client')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen pt-16 pb-12">
    <div class="container mx-auto px-4 max-w-3xl py-16">

        {{-- En-tête avec titre + fil d'Ariane --}}
        <div class="md:flex justify-between items-center mb-8">
            <h5 class="text-lg font-semibold text-slate-900 dark:text-white">
                Modifier le client
                <span class="text-blue-600 dark:text-blue-400">{{ $client->prenom }} {{ $client->nom }}</span>
            </h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[16px] font-medium duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                    <a href="{{ route('admin.dashboard') }}">Afrique évasion</a>
                </li>
                <li class="inline-block text-base mx-0.5 ltr:rotate-0 rtl:rotate-180 text-gray-500 dark:text-gray-400">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Modifier Client</li>
            </ul>
        </div>

        {{-- Erreurs --}}
        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-400 rounded border border-red-300 dark:border-red-700">
            <ul class="list-disc pl-6 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Photo profil client (en pleine largeur) --}}
            <div class="flex flex-col items-center w-full text-center">
                <label for="photo_profil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Photo de profil
                </label>

                <input
                    type="file"
                    name="photo_profil"
                    id="photo_profil"
                    class="w-full max-w-xs text-gray-700 dark:text-gray-300">

                @if ($client->photo_profil)
                <img
                    src="{{ $client->photo_profil ? asset('/imageDes/uploads/' . $client->photo_profil) : asset('images/default-avatar.png') }}"
                    alt="Photo profil"
                    class="mt-4 w-28 h-28 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                @endif
            </div>


            {{-- Tous les champs en grille 2 colonnes --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Prénom <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="prenom"
                        id="prenom"
                        value="{{ old('prenom', $client->prenom) }}"
                        placeholder="Non renseigné"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        value="{{ old('nom', $client->nom) }}"
                        placeholder="Non renseigné"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $client->email) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input
                        type="text"
                        name="telephone"
                        id="telephone"
                        value="{{ old('telephone', $client->telephone) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                    <input
                        type="text"
                        name="adresse"
                        id="adresse"
                        value="{{ old('adresse', $client->adresse) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="pays" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Pays</label>
                    <input
                        type="text"
                        name="pays"
                        id="pays"
                        value="{{ old('pays', $client->pays) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="ville" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Ville</label>
                    <input
                        type="text"
                        name="ville"
                        id="ville"
                        value="{{ old('ville', $client->ville) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="code_postal" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Code postal</label>
                    <input
                        type="text"
                        name="code_postal"
                        id="code_postal"
                        value="{{ old('code_postal', $client->code_postal) }}"
                        placeholder="Non renseigné"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>



            {{-- Boutons --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
                    Mettre à jour
                </button>
                <a href="{{ route('admin.clients.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection