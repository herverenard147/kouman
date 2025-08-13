@extends('layout.base')
@section('title', 'Liste des Clients')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="layout-specing">

        {{-- En-tête agrandie --}}
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Liste complète des clients
                </h1>
            </div>
        </div>
        <hr class="border-gray-300 dark:border-gray-700 mb-6">

        {{-- Liste des clients --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($clients as $client)
            <div class="group rounded-xl bg-white dark:bg-slate-800 shadow-md hover:shadow-xl overflow-hidden transition-all duration-300 p-5">

                {{-- Photo --}}
                <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-4 border-2 border-gray-200 dark:border-gray-700">
                    <img 
                    src="{{ '/imageDes/uploads/' . $client->photo_profil ? asset('/imageDes/uploads/'. $client->photo_profil) : asset('images/default-avatar.png') }}"
                         alt="{{ $client->nom }} {{ $client->prenom }}"
                         class="w-full h-full object-cover">
                </div>
                
                {{-- Nom --}}
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white text-center">
                    {{ $client->nom }} {{ $client->prenom }}
                </h2>

                {{-- Email --}}
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center justify-center gap-1">
                    <i class="mdi mdi-email-outline text-blue-500 text-lg"></i>
                    {{ $client->email }}
                </p>

                {{-- Téléphone --}}
                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1">
                    <i class="mdi mdi-phone-outline text-green-500 text-lg"></i>
                    {{ $client->telephone ?? 'Non renseigné' }}
                </p>

                {{-- Actions --}}
                <div class="flex flex-wrap items-center justify-center gap-2 mt-4">
                    <a href="{{ route('admin.clients.edit', $client->id) }}"
                        class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition flex items-center gap-1">
                        <i class="mdi mdi-pencil"></i> Modifier
                    </a>

                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition flex items-center gap-1">
                            <i class="mdi mdi-delete"></i> Supprimer
                        </button>
                    </form>

                    <a href="{{ route('admin.clients.orders', $client->id) }}"
                        class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600 transition flex items-center gap-1">
                        <i class="mdi mdi-cart-outline"></i> Commandes
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500 text-lg">Aucun client enregistré pour le moment.</p>
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
