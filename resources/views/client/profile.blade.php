@extends('layout.base')

@section('title', 'Profil utilisateur')

@section('content')
<div class="container mx-auto p-6 bg-white dark:bg-slate-900 min-h-screen rounded-lg shadow-lg">
    <h1 class="text-4xl font-extrabold mb-6 text-black dark:text-white border-b-4 border-green-600 pb-2">
        Mon profil
    </h1>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Colonne gauche : photo et infos de base -->
        <div class="md:w-1/3 bg-green-50 dark:bg-slate-800 rounded-lg p-6 shadow-md flex flex-col items-center">
            <img src="{{ asset('images/client/07.jpg') }}" alt="Photo de profil" class="w-40 h-40 rounded-full object-cover shadow-lg mb-4 border-4 border-green-600">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">Jean Dupont</h2>
            <p class="text-green-600 font-medium mb-4">Partenaire Résidence</p>

            <ul class="w-full space-y-3 text-gray-700 dark:text-gray-300">
                <li><strong>Email :</strong> jean.dupont@example.com</li>
                <li><strong>Téléphone :</strong> +33 6 12 34 56 78</li>
                <li><strong>Adresse :</strong> 123 rue Exemple, Paris</li>
                <li><strong>Site Web :</strong> <a href="https://exemple.com" target="_blank" class="text-green-600 underline">exemple.com</a></li>
                <li><strong>Statut :</strong> Actif</li>
            </ul>
        </div>

        <!-- Colonne droite : description et actions -->
        <div class="md:w-2/3 bg-gray-50 dark:bg-slate-800 rounded-lg p-6 shadow-md">
            <h3 class="text-2xl font-semibold text-black dark:text-white mb-4">Bienvenue sur votre espace partenaire</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                Gérez vos propriétés, mettez à jour vos informations personnelles et suivez vos réservations facilement via votre tableau de bord.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow transition">
                    Modifier mes informations
                </a>
                <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded shadow transition">
                    Changer mon mot de passe
                </a>
                <a href="#" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded shadow transition">
                    Vérifier mon email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
