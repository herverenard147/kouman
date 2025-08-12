@extends('layout.base')
@section('title', 'Tableau de bord Administrateur')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="layout-specing">
        <div class="flex justify-between items-center">
            <div>
                <h5 class="text-xl font-semibold text-slate-900 dark:text-white">
                    Bonjour, {{ $admin->nom }}
                </h5>
                <h6 class="text-gray-600 dark:text-gray-300">Bienvenue sur votre espace administrateur</h6>
            </div>
        </div>

        {{-- Cartes de statistiques --}}
        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow">
                <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Utilisateurs clients</h6>
                <p class="mt-2 text-2xl font-bold text-green-600">{{ $stats['clients_count'] ?? 0 }}</p>
                <a href="{{ route('admin.clients.index') }}" class="text-sm text-blue-500 hover:underline">Gérer les clients</a>
            </div>

            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow">
                <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Partenaires inscrits</h6>
                <p class="mt-2 text-2xl font-bold text-green-600">{{ $stats['partners_count'] ?? 0 }}</p>
                <a href="{{ route('admin.partners.index') }}" class="text-sm text-blue-500 hover:underline">Gérer les partenaires</a>
            </div>          
        </div>

        {{-- Liens rapides CRUD --}}
        <div class="mt-8 grid md:grid-cols-2 gap-6">
            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow">
                <h6 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Gestion Clients</h6>
                <ul class="list-disc list-inside text-slate-700 dark:text-gray-300">
                    <li><a href="{{ route('admin.clients.create') }}" class="text-blue-500 hover:underline">Ajouter un client</a></li>
                    <li><a href="{{ route('admin.clients.index') }}" class="text-blue-500 hover:underline">Liste des clients</a></li>
                </ul>
            </div>

            <div class="p-6 bg-white dark:bg-slate-800 rounded-md shadow">
                <h6 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Gestion Partenaires</h6>
                <ul class="list-disc list-inside text-slate-700 dark:text-gray-300">
                    <li><a href="{{ route('admin.partners.create') }}" class="text-blue-500 hover:underline">Ajouter un partenaire</a></li>
                    <li><a href="{{ route('admin.partners.index') }}" class="text-blue-500 hover:underline">Liste des partenaires</a></li>
                </ul>
            </div>
        </div>

        {{-- Tableau des dernières activités --}}
        <div class="mt-8 bg-white dark:bg-slate-800 rounded-md shadow overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h6 class="text-lg font-semibold text-slate-900 dark:text-white">Dernières activités</h6>
                <a href="{{ route('admin.activities.index') }}" class="text-sm text-blue-500 hover:underline">Voir tout</a>
            </div>
            <div class="overflow-x-auto max-h-64">
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="px-4 py-3 text-slate-900 dark:text-white">Date</th>
                            <th class="px-4 py-3 text-slate-900 dark:text-white">Utilisateur</th>
                            <th class="px-4 py-3 text-slate-900 dark:text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities ?? [] as $activity)
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">{{ $activity->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">{{ $activity->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">Aucune activité récente</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
