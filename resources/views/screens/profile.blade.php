@extends('layout.base')

@section('title', 'Profil utilisateur')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
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
                                    <h5 class="text-lg font-semibold text-black dark:text-white">Calvin Carlo</h5>
                                    <p class="text-slate-400 dark:text-slate-300">calvin@hotmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 dark:border-slate-700">
                            <h5 class="text-xl font-semibold mt-4 text-black dark:text-white">Détails personnels :</h5>
                            <div class="mt-4 space-y-4">
                                @php
                                    $infos = [
                                        ['icon' => 'mail', 'label' => 'Email', 'value' => 'calvin@hotmail.com', 'href' => true],
                                        ['icon' => 'bookmark', 'label' => 'Compétences', 'value' => 'html, css, js, mysql', 'href' => false],
                                        ['icon' => 'italic', 'label' => 'Langues', 'value' => 'Anglais, Japonais, Chinois', 'href' => false],
                                        ['icon' => 'globe', 'label' => 'Site Web', 'value' => 'www.cristina.com', 'href' => true],
                                        ['icon' => 'gift', 'label' => 'Date de naissance', 'value' => '2 Mars 1996', 'href' => false],
                                        ['icon' => 'map-pin', 'label' => 'Localisation', 'value' => 'Pékin, Chine', 'href' => false],
                                        ['icon' => 'phone', 'label' => 'Téléphone', 'value' => '(+12) 1254-56-4896', 'href' => true],
                                    ];
                                @endphp

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

                <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-xl font-semibold text-black dark:text-white">Calvin Carlo</h5>
                            <p class="text-slate-400 dark:text-slate-300 mt-3">
                                J’ai commencé ma carrière comme stagiaire et j’ai su faire mes preuves, atteignant les étapes clés grâce à un bon encadrement jusqu’à devenir chef de projet. Ce parcours m’a permis de comprendre toutes les étapes, faisant de moi un bon développeur, un bon chef d’équipe et un manager efficace.
                            </p>
                        </div>

                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-xl font-semibold text-black dark:text-white">Mes propriétés :</h5>
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">
                                @include('base.components.user-profile.properties2')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin du contenu -->
        </div>
    </div><!--fin container-->
</div>
@endsection
