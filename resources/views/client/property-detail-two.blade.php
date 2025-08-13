@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')
@section('title', $item['title'] ?? 'Détail')
@section('content')

<section class="relative md:py-24 pt-24 pb-16 mt-10">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">

            {{-- Colonne principale --}}
            <div class="lg:col-span-8 md:col-span-7">
                {{-- Carousel simple (images) --}}
                <div class="grid grid-cols-1 relative">
                    <div class="tiny-one-item">
                        @forelse(($item['images'] ?? []) as $img)
                        <div class="tiny-slide">
                            <img src="{{ $img }}" class="rounded-md shadow dark:shadow-gray-700 w-full h-auto" alt="">
                        </div>
                        @empty
                        <div class="tiny-slide">
                            <img src="{{ $item['img'] ?? '' }}" class="rounded-md shadow dark:shadow-gray-700 w-full h-auto" alt="">
                        </div>
                        @endforelse
                    </div>
                </div>

                <h4 class="text-2xl font-medium mt-6 mb-3">
                    {{ $item['title'] ?? '' }}
                </h4>

                @if(!empty($item['localisation']))
                <span class="text-slate-400 flex items-center">
                    <i data-feather="map-pin" class="size-5 me-2"></i> {{ $item['localisation'] }}
                </span>
                @endif

                {{-- Bandeau caractéristiques selon la catégorie --}}
                <ul class="py-6 flex flex-wrap items-center gap-6 list-none">
                    @if(($item['categorie'] ?? '') === 'hebergement')
                    <li class="flex items-center gap-2">
                        <i class="uil uil-bed-double lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['nombreChambres'] ?? 0 }} chambre(s)</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="uil uil-bath lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['nombreSallesDeBain'] ?? 0 }} salle(s) de bain</span>
                    </li>
                    @if(!empty($item['capaciteMax']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-users-alt lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['capaciteMax'] }} pers.</span>
                    </li>
                    @endif
                    @if(!empty($item['noteMoyenne']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-star lg:text-3xl text-2xl text-yellow-500"></i>
                        <span class="lg:text-xl">{{ $item['noteMoyenne'] }}/5</span>
                    </li>
                    @endif
                    @endif

                    @if(($item['categorie'] ?? '') === 'vol')
                    <li class="flex items-center gap-2">
                        <i class="uil uil-plane-departure lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['depart'] ?? '-' }} → {{ $item['arrivee'] ?? '-' }}</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="uil uil-building lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['compagnie'] ?? '-' }} @if(!empty($item['numeroVol'])) • {{ $item['numeroVol'] }} @endif</span>
                    </li>
                    @if(!empty($item['dateDepart']) || !empty($item['dateArrivee']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-clock lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">
                            {{ $item['dateDepart'] ?? '' }}
                            @if(!empty($item['dateArrivee'])) → {{ $item['dateArrivee'] }} @endif
                        </span>
                    </li>
                    @endif
                    @endif

                    @if(($item['categorie'] ?? '') === 'excursion')
                    @php $d = $item['duree'] ?? null; @endphp
                    <li class="flex items-center gap-2">
                        <i class="uil uil-clock lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">
                            @if($d !== null) {{ $d }} {{ $d > 1 ? 'heures' : 'heure' }} @else - @endif
                        </span>
                    </li>
                    @if(!empty($item['capaciteMax']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-users-alt lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['capaciteMax'] }} pers.</span>
                    </li>
                    @endif
                    @if(!empty($item['ageMinimum']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-user lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">Âge min. : {{ $item['ageMinimum'] }} ans</span>
                    </li>
                    @endif
                    @endif

                    @if(($item['categorie'] ?? '') === 'evenement')
                    @php $d = $item['duree'] ?? null; @endphp
                    <li class="flex items-center gap-2">
                        <i class="uil uil-clock lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">
                            @if($d !== null) {{ $d }} {{ $d > 1 ? 'heures' : 'heure' }} @else - @endif
                        </span>
                    </li>
                    @if(!empty($item['capaciteMax']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-users-alt lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl">{{ $item['capaciteMax'] }} pers.</span>
                    </li>
                    @endif
                    @if(!empty($item['statut']))
                    <li class="flex items-center gap-2">
                        <i class="uil uil-check-circle lg:text-3xl text-2xl text-green-600"></i>
                        <span class="lg:text-xl capitalize">{{ $item['statut'] }}</span>
                    </li>
                    @endif
                    @endif
                </ul>

                {{-- Description --}}
                @if(!empty($item['description']))
                <div class="prose prose-slate max-w-none dark:prose-invert text-slate-600 dark:text-slate-300">
                    {!! nl2br(e($item['description'])) !!}
                </div>
                @endif

                {{-- Map (optionnel) : garde ton iframe si tu as une adresse connue --}}
                {{-- <div class="w-full leading-[0] border-0 mt-6">
                    <iframe ... class="w-full h-[500px]" allowfullscreen></iframe>
                </div> --}}
            </div>

            {{-- Colonne prix + actions --}}
            <div class="lg:col-span-4 md:col-span-5">
                <div class="sticky top-20">
                    <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                        <div class="p-6">
                            <h5 class="text-2xl font-medium">Prix :</h5>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-medium">{{ $item['price'] ?? '' }}</span>
                                @if(($item['categorie'] ?? '') === 'hebergement')
                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.5 rounded h-6">Par nuit</span>
                                @elseif(($item['categorie'] ?? '') === 'vol')
                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.5 rounded h-6">Billet</span>
                                @elseif(($item['categorie'] ?? '') === 'excursion')
                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.5 rounded h-6">Par personne</span>
                                @elseif(($item['categorie'] ?? '') === 'evenement')
                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.5 rounded h-6">Entrée</span>
                                @endif
                            </div>

                            {{-- Infos rapides à droite (facultatif) --}}
                            <ul class="list-none mt-4 space-y-2 text-sm">
                                @if(($item['categorie'] ?? '') === 'hebergement')
                                @if(!empty($item['heureArrivee']) || !empty($item['heureDepart']))
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Arrivée / Départ</span>
                                    <span class="font-medium">
                                        {{ $item['heureArrivee'] ?? '-' }} / {{ $item['heureDepart'] ?? '-' }}
                                    </span>
                                </li>
                                @endif
                                @if(!empty($item['numeroDeTel']))
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Contact</span>
                                    <span class="font-medium">{{ $item['numeroDeTel'] }}</span>
                                </li>
                                @endif
                                @endif

                                @if(($item['categorie'] ?? '') === 'vol')
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Compagnie</span>
                                    <span class="font-medium">{{ $item['compagnie'] ?? '-' }}</span>
                                </li>
                                @if(!empty($item['numeroVol']))
                                <li class="flex justify-between">
                                    <span class="text-slate-400">N° vol</span>
                                    <span class="font-medium">{{ $item['numeroVol'] }}</span>
                                </li>
                                @endif
                                @endif

                                @if(($item['categorie'] ?? '') === 'excursion' && !empty($item['ageMinimum']))
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Âge minimum</span>
                                    <span class="font-medium">{{ $item['ageMinimum'] }} ans</span>
                                </li>
                                @endif

                                {{-- Stock ou places disponibles --}}
                                @php
                                    $cat = $item['categorie'] ?? '';
                                @endphp

                                @if($cat === 'vol' && isset($item['placesDisponibles']))
                                    <li class="flex justify-between">
                                        <span class="text-slate-400">Places restantes</span>
                                        <span class="font-medium text-green-600">
                                            {{ $item['placesDisponibles'] > 0 ? $item['placesDisponibles'] : 'Complet' }}
                                        </span>
                                    </li>
                                @elseif(in_array($cat, ['hebergement', 'evenement']) && isset($item['stock']))
                                    <li class="flex justify-between">
                                        <span class="text-slate-400">Disponibilité</span>
                                        <span class="font-medium {{ $item['stock'] > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $item['stock'] > 0 ? $item['stock'].' disponible(s)' : 'Complet' }}
                                        </span>
                                    </li>
                                @elseif(in_array($cat, ['excursion']) && isset($item['stock']))
                                    <li class="flex justify-between">
                                        <span class="text-slate-400">Disponibilité</span>
                                        <span class="font-medium {{ $item['capaciteMax'] > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $item['capaciteMax'] > 0 ? $item['capaciteMax'].' disponible(s)' : 'Complet' }}
                                        </span>
                                    </li>
                                @endif

                                {{-- ================== AJOUT : Infos Partenaire ================== --}}
                                @php
                                    $idPartenaireCtx = $item['idPartenaire'] ?? request('idPartenaire');
                                    $nomPartenaire = $item['partenaireNom'] ?? null;
                                    $telPartenaire = $item['partenaireTel'] ?? null;
                                    $mailPartenaire = $item['partenaireMail'] ?? null;
                                    $sitePartenaire = $item['partenaireSite'] ?? null;
                                @endphp

                                @if($nomPartenaire || $idPartenaireCtx)
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Partenaire</span>
                                    <span class="font-medium">
                                        {{ $nomPartenaire ?? ('ID: '.$idPartenaireCtx) }}
                                    </span>
                                </li>
                                @endif

                                @if($telPartenaire)
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Tél. partenaire</span>
                                    <span class="font-medium">{{ $telPartenaire }}</span>
                                </li>
                                @endif

                                @if($mailPartenaire)
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Email partenaire</span>
                                    <span class="font-medium">{{ $mailPartenaire }}</span>
                                </li>
                                @endif

                                @if($sitePartenaire)
                                <li class="flex justify-between">
                                    <span class="text-slate-400">Site partenaire</span>
                                    <span class="font-medium">
                                        <a href="{{ str_starts_with($sitePartenaire, 'http') ? $sitePartenaire : 'https://'.$sitePartenaire }}"
                                            target="_blank" rel="noopener" class="text-green-600 hover:underline">
                                            {{ $sitePartenaire }}
                                        </a>
                                    </span>
                                </li>
                                @endif
                                {{-- ================== /AJOUT ================== --}}
                            </ul>

                        </div>

                        @php
                        $categorie = strtolower($item['categorie'] ?? '');
                        $stock = isset($item['stock']) ? (int) $item['stock'] : null;
                        $places = isset($item['placesDisponibles']) ? (int) $item['placesDisponibles'] : null;
                        $capaciteMax = isset($item['capaciteMax']) ? (int) $item['capaciteMax'] : null;

                        $isAvailable = true;

                        if ($categorie === 'vol') {
                            $isAvailable = $places !== null && $places > 0;
                        } elseif (in_array($categorie, ['hebergement', 'evenement'])) {
                            $isAvailable = $stock !== null && $stock > 0;
                        } elseif (in_array($categorie, ['excursion'])) {
                            $isAvailable = $capaciteMax !== null && $capaciteMax > 0;
                        }
                        @endphp

                        <div class="flex py-6">
                            <div class="p-1 w-full flex justify-center">
                                <form action="{{ route('client.cart.add') }}" method="POST" class="w-full max-w-xs">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] ?? '' }}">
                                    <input type="hidden" name="name" value="{{ $item['title'] ?? '' }}">
                                    <input type="hidden" name="price" value="{{ isset($item['price_num']) ? $item['price_num'] : (isset($item['price']) ? preg_replace('/\D+/', '', $item['price']) : '') }}">
                                    <input type="hidden" name="image" value="{{ $item['img'] ?? '' }}">
                                    <input type="hidden" name="categorie" value="{{ $item['categorie'] ?? '' }}">
                                    <input type="hidden" name="idPartenaire" value="{{ $item['idPartenaire'] ?? '' }}">
                                    <input type="hidden" name="nomPartenaire" value="{{ $item['partenaireNom'] ?? '' }}">

                                    <button type="submit"
                                        class="w-full px-3 py-2 rounded text-white text-sm shadow text-center
                                            {{ $isAvailable ? 'bg-green-600 hover:bg-green-700' : 'bg-gray-400 cursor-not-allowed' }}"
                                        {{ $isAvailable ? '' : 'disabled' }}>
                                        {{ $isAvailable ? 'Ajouter au panier' : 'Indisponible' }}
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="mt-12 text-center">
                        <h3 class="mb-6 text-xl leading-normal font-medium text-black dark:text-white">Des questions ?</h3>
                        <div class="mt-6">
                            <a href="{{ route('client.contact') }}" class="btn bg-transparent hover:bg-green-600 border border-green-600 text-green-600 hover:text-white rounded-md">
                                <i class="uil uil-phone align-middle me-2"></i> Nous contacter
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
