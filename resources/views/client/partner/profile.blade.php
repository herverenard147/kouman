@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')
@section('title', 'Profil du partenaire')

@section('content')
<section class="relative md:py-24 pt-24 pb-16">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="p-6 rounded-md bg-green-600/10 dark:bg-green-600/20">
                <div class="md:flex items-center">
                    <img src="{{ $logo }}" class="rounded-full size-28" alt="{{ $partenaire->nom_entreprise }}">

                    <div class="md:ms-4 md:mt-0 mt-4 md:flex justify-between items-end">
                        <div>
                            <h5 class="text-2xl font-medium">
                                {{ $partenaire->nom_entreprise }}
                                <span class="text-base md:inline block md:mt-0 mt-2">
                                    <span class="text-slate-400">
                                        <span class="mdi mdi-circle-medium align-middle md:inline-block hidden"></span>
                                        {{ $partenaire->type ?? 'Partenaire' }}
                                    </span>
                                    @if(!empty($partenaire->siteWeb))
                                        — <a href="{{ $partenaire->siteWeb }}" target="_blank" rel="noopener" class="hover:text-green-600">Site web</a>
                                    @endif
                                </span>
                            </h5>

                            <ul class="list-none mt-2 md:flex items-center md:divide-x-[1px] divide-slate-400">
                                <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                    @if(!empty($partenaire->telephone))
                                        <i data-feather="phone" class="size-4 align-middle text-green-600 me-2"></i>
                                        {{ $partenaire->telephone }}
                                    @endif
                                </li>
                                <li class="md:inline-flex flex items-center md:mx-2 md:mt-0 mt-2 md:px-2">
                                    @if(!empty($partenaire->email))
                                        <i data-feather="mail" class="size-4 align-middle text-green-600 me-2"></i>
                                        {{ $partenaire->email }}
                                    @endif
                                </li>
                                {{-- Réseaux sociaux si tu as des colonnes (facebook, instagram, etc.) --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--fin grid-->
    </div><!--fin container-->

    <div class="container relative mt-6">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            {{-- Colonne contact --}}
            <div class="lg:col-span-4 md:col-span-5 order-1 md:order-1">
                <div class="p-6 rounded shadow dark:shadow-gray-700 sticky top-20">
                    <h5 class="text-xl font-medium mb-4">Contacter le partenaire</h5>

                    @if(session('success'))
                        <div class="p-3 rounded bg-green-100 text-green-700 mb-3">{{ session('success') }}</div>
                    @endif

                    <form method="post">
                        @csrf
                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label for="name" class="font-medium">Votre nom :</label>
                                <input name="name" id="name" type="text" class="form-input mt-2" placeholder="Nom :" value="{{ old('name') }}">
                                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="font-medium">Votre email :</label>
                                <input name="email" id="email" type="email" class="form-input mt-2" placeholder="Email :" value="{{ old('email') }}">
                                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="subject" class="font-medium">Votre question :</label>
                                <input name="subject" id="subject" class="form-input mt-2" placeholder="Objet :" value="{{ old('subject') }}">
                                @error('subject') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="comments" class="font-medium">Votre message :</label>
                                <textarea name="comments" id="comments" class="form-input mt-2 textarea" placeholder="Message :">{{ old('comments') }}</textarea>
                                @error('comments') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Envoyer le message</button>
                        </div>
                    </form>

                    {{-- Petites stats --}}
                    <div class="mt-6 grid grid-cols-2 gap-3 text-sm text-slate-600">
                        <div class="p-3 rounded border">
                            <div class="font-semibold">{{ $stats['hebergements'] }}</div>
                            <div>Hébergements</div>
                        </div>
                        <div class="p-3 rounded border">
                            <div class="font-semibold">{{ $stats['evenements'] }}</div>
                            <div>Événements</div>
                        </div>
                        <div class="p-3 rounded border">
                            <div class="font-semibold">{{ $stats['excursions'] }}</div>
                            <div>Excursions</div>
                        </div>
                        <div class="p-3 rounded border">
                            <div class="font-semibold">{{ $stats['vols'] }}</div>
                            <div>Vols</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Colonne contenu --}}
            <div class="lg:col-span-8 md:col-span-7 order-1 md:order-2">
                <h5 class="text-xl font-medium">À propos</h5>
                <p class="text-slate-400 mt-3">
                    {{ $partenaire->description ?? "Informations à venir." }}
                </p>

                {{-- Annonces / items du partenaire --}}
                <h5 class="text-xl font-medium mt-6">Hébergements</h5>
                <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
                    @forelse($hebergements as $h)
                        @include('client.base.components.pages.hebergement-card', ['hebergement' => $h])
                    @empty
                        <p class="text-slate-400">Aucun hébergement.</p>
                    @endforelse
                </div>

                <h5 class="text-xl font-medium mt-6">Événements</h5>
                <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
                    @forelse($evenements as $e)
                        @include('client.base.components.pages.evenement-card', ['evenement' => $e])
                    @empty
                        <p class="text-slate-400">Aucun événement.</p>
                    @endforelse
                </div>

                <h5 class="text-xl font-medium mt-6">Excursions</h5>
                <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
                    @forelse($excursions as $ex)
                        @include('client.base.components.pages.excursion-card', ['excursion' => $ex])
                    @empty
                        <p class="text-slate-400">Aucune excursion.</p>
                    @endforelse
                </div>

                <h5 class="text-xl font-medium mt-6">Vols</h5>
                <div class="grid lg:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
                    @forelse($vols as $v)
                        @include('client.base.components.pages.vol-card', ['vol' => $v])
                    @empty
                        <p class="text-slate-400">Aucun vol.</p>
                    @endforelse
                </div>

                <div class="md:flex justify-center text-center mt-6">
                    <div class="md:w-full">
                        <a href="{{ route('client.grid') }}"
                           class="btn btn-link text-green-600 hover:text-green-600 after:bg-green-600 transition duration-500">
                            Voir plus de propriétés <i class="uil uil-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div><!--fin grid-->
    </div><!--fin container-->
</section>
@endsection
