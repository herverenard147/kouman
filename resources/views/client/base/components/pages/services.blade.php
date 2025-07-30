@php
$services = [
[
'icon' => 'uil uil-home',
'title' => 'Réservation d’hébergement',
'desc' => 'Accédez à un large choix d’hôtels, résidences et chambres, partout en Afrique, au meilleur prix.',
],
[
'icon' => 'uil uil-plane',
'title' => 'Comparaison de vols',
'desc' => 'Comparez facilement les billets d’avion vers vos destinations africaines favorites pour toujours trouver la meilleure offre.',
],
[
'icon' => 'uil uil-briefcase-alt',
'title' => 'Excursions & événements',
'desc' => 'Découvrez des activités culturelles, excursions, événements et expériences authentiques proposées par nos partenaires locaux.',
],
[
'icon' => 'uil uil-shield-check',
'title' => 'Paiements sécurisés',
'desc' => 'Tous les paiements sont protégés grâce à notre plateforme sécurisée, pour une tranquillité d’esprit totale.',
],
[
'icon' => 'uil uil-users-alt',
'title' => 'Support client africain',
'desc' => 'Notre équipe locale vous accompagne à chaque étape pour rendre votre voyage simple et agréable.',
],
[
'icon' => 'uil uil-user-check',
'title' => 'Inscription partenaires',
'desc' => 'Les hôtels, agences et compagnies aériennes peuvent facilement rejoindre notre réseau et proposer leurs offres directement.',
],
];
@endphp

@foreach ($services as $item)
<!-- Carte centrée -->
<div class="group relative rounded-xl bg-white dark:bg-slate-900 overflow-hidden transition-all duration-500 ease-in-out p-8 flex flex-col items-center text-center">

    <!-- Zone icône -->
    <div class="relative w-28 h-28 mx-auto">
        <i data-feather="hexagon" class="absolute inset-0 m-auto size-28 fill-green-600/5 text-transparent"></i>
        <div class="absolute inset-0 flex items-center justify-center">
            <i class="{{ $item['icon'] }} text-4xl text-green-600"></i>
        </div>
    </div>

    <!-- Texte -->
    <div class="mt-6">
        <a href="#" class="text-xl font-medium hover:text-green-600">{{ $item['title'] }}</a>
        <p class="text-slate-400 mt-3">{{ $item['desc'] }}</p>
    </div>
</div>

<!-- Contenu -->
@endforeach