@extends('layout.base')
@section('title', 'Modifier Client')

@section('content')
<div class="min-h-screen bg-red dark:bg-gray-900 pt-16 pb-12">
    <div class="container-fluid relative px-3 dark:bg-slate-900 min-h-screen py-16">
        <div class="max-w-3xl mx-auto bg-slate-900 dark:bg-slate-900 rounded shadow p-8">

            {{-- En-tête --}}
            <header class="mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                    Modifier le client
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
            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $client->prenom) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nom <span class="text-red-500">*</span></label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $client->nom) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $client->telephone) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                    <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $client->adresse) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div>
                        <label for="pays" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Pays</label>
                        <input type="text" name="pays" id="pays" value="{{ old('pays', $client->pays) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="ville" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Ville</label>
                        <input type="text" name="ville" id="ville" value="{{ old('ville', $client->ville) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="code_postal" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Code postal</label>
                        <input type="text" name="code_postal" id="code_postal" value="{{ old('code_postal', $client->code_postal) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                {{-- Photo profil client --}}
                <div>
                    <label for="photo_profil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Photo de profil</label>
                    <input type="file" name="photo_profil" id="photo_profil" class="w-full text-gray-700 dark:text-gray-300">
                    @if ($client->photo_profil)
                    <img src="{{ asset('/clients/photos/' . $client->photo_profil) }}" alt="Photo profil"
                        class="mt-4 w-28 h-28 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition font-semibold">
                        Mettre à jour
                    </button>
                    <a href="{{ route('admin.clients.index') }}" class="text-gray-600 hover:underline">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection