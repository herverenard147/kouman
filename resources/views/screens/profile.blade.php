@extends('layout.base')

@section('title', 'Profil utilisateur')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
    $partenaire = Auth::guard('partenaire')->user();

    $infos = [
        ['icon' => 'mail', 'label' => 'Email', 'value' => $partenaire->email, 'href' => true],
        ['icon' => 'bookmark', 'label' => 'Type de partenaire', 'value' => ucfirst(str_replace('_', ' ', $partenaire->type)), 'href' => false],
        ['icon' => 'globe', 'label' => 'Site Web', 'value' => $partenaire->siteWeb ?? 'Non défini', 'href' => $partenaire->siteWeb ? true : false],
        ['icon' => 'map-pin', 'label' => 'Adresse', 'value' => $partenaire->adresse, 'href' => false],
        ['icon' => 'phone', 'label' => 'Téléphone', 'value' => $partenaire->téléphone, 'href' => true],
        ['icon' => 'check-circle', 'label' => 'Statut', 'value' => ucfirst($partenaire->statut), 'href' => false],
    ];
@endphp

<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">

            <!-- Boutons de gestion -->
            <div class="mb-6">
                <ul class="flex flex-wrap gap-4">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                           class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Modifier mes informations
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('password.change') }}"
                           class="inline-block bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
                            Changer mon mot de passe
                        </a>
                    </li>
                    @if (! $partenaire->hasVerifiedEmail())
                        <li>
                            <a href="{{ route('verification.notice') }}"
                               class="inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">
                                Vérifier mon email
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Bannière de profil -->
            <div class="grid grid-cols-1">
                <div class="profile-banner relative text-transparent rounded-md shadow overflow-hidden">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)">
                    <div class="relative shrink-0">
                        <img src="{{ asset('images/bg.jpg') }}" class="h-80 w-full object-cover" id="profile-banner" alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1">
                <!-- Colonne profil -->
                <div class="xl:col-span-3 lg:col-span-4 md:col-span-4 mx-6">
                    <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800 -mt-48">
                        <div class="profile-pic text-center mb-5">
                            <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                            <div>
                                <div class="relative size-24 mx-auto">
                                    <img src="{{asset("/images/client/07.jpg")}}" class="rounded-full shadow ring-4 ring-slate-50 dark:ring-slate-700" id="profile-image" alt="">
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>

                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold text-black dark:text-white">{{ $partenaire->nom_entreprise }}</h5>
                                    <p class="text-slate-400 dark:text-slate-300">{{ $partenaire->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 dark:border-slate-700">
                            <h5 class="text-xl font-semibold mt-4 text-black dark:text-white">Détails personnels :</h5>
                            <div class="mt-4 space-y-4">
                                @foreach ($infos as $info)
                                    <div class="flex items-center">
                                        <i data-feather="{{ $info['icon'] }}" class="fea icon-ex-md text-slate-400 dark:text-slate-300 me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-green-600 font-medium mb-0">{{ $info['label'] }} :</h6>
                                            @if ($info['href'])
                                                <a href="#" class="text-slate-400 dark:text-slate-300">{{ $info['value'] }}</a>
                                            @else
                                                <p class="text-slate-400 dark:text-slate-300 mb-0">{{ $info['value'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne contenu -->
                <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Bloc présentation -->
                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-xl font-semibold text-black dark:text-white">{{ $partenaire->nom_entreprise }}</h5>
                            <p class="text-slate-400 dark:text-slate-300 mt-3">
                                Bienvenue sur votre espace partenaire. Gérez vos propriétés, mettez à jour vos informations et restez à jour avec vos réservations.
                            </p>
                        </div>

                        <!-- Bloc propriétés -->
                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-xl font-semibold text-black dark:text-white">Mes propriétés :</h5>
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">
                                @include('base.components.user-profile.properties2')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin contenu -->
        </div>
    </div>
</div>
@endsection
