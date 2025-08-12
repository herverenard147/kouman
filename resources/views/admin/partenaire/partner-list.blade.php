@extends('layout.base')
@section('title', 'Liste des Partenaires')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="layout-specing">

        {{-- En-tête agrandie --}}
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Liste complète des partenaires
                </h1>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Gérez et consultez toutes les informations sur vos partenaires.
                </p>
            </div>
        </div>
        <hr class="border-gray-300 dark:border-gray-700 mb-6">

        {{-- Liste des partenaires --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($partners as $partner)
            <div class="group rounded-xl bg-white dark:bg-slate-800 shadow-md hover:shadow-xl overflow-hidden transition-all duration-300 p-5">

                {{-- Photo --}}
                <div class="w-20 h-20 rounded-full overflow-hidden mx-auto mb-4 border-2 border-gray-200 dark:border-gray-700">
                    <img src="{{ $partner->photo ? asset('storage/'.$partner->photo) : asset('images/default-avatar.png') }}"
                         alt="{{ $partner->nom_entreprise }}"
                         class="w-full h-full object-cover">
                </div>

                {{-- Nom du partenaire --}}
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white text-center">
                    {{ $partner->nom_entreprise ?? 'Nom Entreprise non renseigné' }}
                </h2>

                {{-- Email --}}
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center justify-center gap-1">
                    <i class="mdi mdi-email-outline text-blue-500 text-lg"></i>
                    {{ $partner->email ?? 'Email non renseigné' }}
                </p>

                {{-- Téléphone --}}
                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1">
                    <i class="mdi mdi-phone-outline text-green-500 text-lg"></i>
                    {{ $partner->telephone ?? 'Téléphone non renseigné' }}
                </p>

                {{-- Actions --}}
                <div class="flex flex-wrap items-center justify-center gap-2 mt-4">
                    <a href="{{ route('admin.partners.edit', $partner->id) }}"
                        class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition flex items-center gap-1">
                        <i class="mdi mdi-pencil"></i> Modifier
                    </a>

                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Supprimer ce partenaire ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition flex items-center gap-1">
                            <i class="mdi mdi-delete"></i> Supprimer
                        </button>
                    </form>

                    <a href="{{ route('admin.partners.orders', $partner->id) }}"
                        class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600 transition flex items-center gap-1">
                        <i class="mdi mdi-cart-outline"></i> Commandes
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500 text-lg">Aucun partenaire enregistré pour le moment.</p>
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
