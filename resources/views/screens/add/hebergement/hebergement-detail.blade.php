@extends('layout.base')

@section('title')
    Détail de l'hébergement {{ $hebergement->nom }}
@endsection

@section('content')
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">{{ $hebergement->nom }}</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600"><a href="{{ route('partenaire.dashboard') }}">Afrique évasion</a></li>
                    <li class="inline-block text-base text-slate-950 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">{{ $hebergement->type->nomType ?? 'Hébergement' }}</li>
                </ul>
            </div>

            @if (session('success'))

                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>

            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- <div class="md:flex mt-4">
                <!-- Image principale -->
                <div class="lg:w-1/2 md:w-1/2 p-1">
                    <div class="group relative overflow-hidden rounded-md shadow h-full">
                        <img
                            src="{{ $hebergement->imagePrincipale ? asset('storage/' . $hebergement->imagePrincipale->url) : asset('/images/property/single/1.jpg') }}"
                            alt="Image principale de {{ $hebergement->nom }}"
                            class="w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                            <a
                                href="{{ $hebergement->imagePrincipale ? asset('storage/' . $hebergement->imagePrincipale->url) : asset('/images/property/single/1.jpg') }}"
                                class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"
                            >
                                <i class="mdi mdi-camera-outline"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Images secondaires -->
                <div class="lg:w-1/2 md:w-1/2">
                    <div class="flex">
                        @php
                            // Prendre jusqu'à 4 images secondaires (excluant l'image principale)
                            $imagesSecondaires = $hebergement->images->where('estPrincipale', false)->take(7);
                        @endphp

                        @foreach ($imagesSecondaires->take(2) as $image)
                            <div class="w-1/2 p-1">
                                <div class="group relative overflow-hidden rounded-md shadow">
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                                    <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                        <a href="{{ asset('storage/' . $image->url) }}" class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox">
                                            <i class="mdi mdi-camera-outline"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($imagesSecondaires->count() < 2)
                            @for ($i = $imagesSecondaires->count(); $i < 2; $i++)
                                <div class="w-1/2 p-1">
                                    <div class="group relative overflow-hidden rounded-md shadow">
                                        <img src="{{ asset('/images/property/single/placeholder.jpg') }}" alt="Image placeholder" class="w-full h-48 object-cover">
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>

                    <div class="flex">
                        @foreach ($imagesSecondaires->skip(2)->take(2) as $image)
                            <div class="w-1/2 p-1">
                                <div class="group relative overflow-hidden rounded-md shadow">
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                                    <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                        <a href="{{ asset('storage/' . $image->url) }}" class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox">
                                            <i class="mdi mdi-camera-outline"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($imagesSecondaires->count() < 4)
                            @for ($i = $imagesSecondaires->count() - 2; $i < 2; $i++)
                                <div class="w-1/2 p-1">
                                    <div class="group relative overflow-hidden rounded-md shadow">
                                        <img src="{{ asset('/images/property/single/placeholder.jpg') }}" alt="Image placeholder" class="w-full h-48 object-cover">
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div><!--end flex--> --}}


            <div class="md:flex mt-4">
                <!-- Image principale -->
                <div class="lg:w-1/2 md:w-1/2 p-1">
                    <div class="group relative overflow-hidden rounded-md shadow h-full">
                        <img
                            src="{{ $hebergement->imagePrincipale->estPrincipale ? asset('storage/' . $hebergement->imagePrincipale->url) : asset('/images/property/single/1.jpg') }}"
                            alt="Image principale de {{ $hebergement->nom }}"
                            class="w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                            <a
                                href="{{ $hebergement->imagePrincipale ? asset('storage/' . $hebergement->imagePrincipale->url) : asset('/images/property/single/1.jpg') }}"
                                class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"
                            >
                                <i class="mdi mdi-camera-outline"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Images secondaires -->
                <div class="lg:w-1/2 md:w-1/2">
                    @php
                        // Jusqu’à 9 images secondaires (max total : 10 images avec la principale)
                        $imagesSecondaires = $hebergement->images->where('estPrincipale', false)->take(9);
                        $totalSecondaires = $imagesSecondaires->count();
                    @endphp

                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($imagesSecondaires as $image)
                            <div class="p-1">
                                <div class="group relative overflow-hidden rounded-md shadow">
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-48 object-cover">
                                    <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                                    <div class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                        <a href="{{ asset('storage/' . $image->url) }}" class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox">
                                            <i class="mdi mdi-camera-outline"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- @for ($i = $totalSecondaires; $i < 9; $i++)
                            <div class="p-1">
                                <div class="group relative overflow-hidden rounded-md shadow">
                                    <img src="{{ asset('/images/property/single/placeholder.jpg') }}" alt="Image placeholder" class="w-full h-48 object-cover">
                                </div>
                            </div>
                        @endfor --}}
                    </div>
                </div>
            </div>


            <div class="grid lg:grid-cols-12 md:grid-cols-2 gap-6 mt-6">
                <!-- Section détails -->
                <div class="lg:col-span-8">
                    <div class="bg-white p-6 rounded-md shadow">
                        <h4 class="text-2xl font-medium">{{ $hebergement->nom }}</h4>
                        <p class="text-gray-500 text-sm mt-1">
                            {{ $hebergement->localisation->adresse ?? 'N/A' }}, {{ $hebergement->localisation->ville ?? 'N/A' }}, {{ $hebergement->localisation->pays ?? 'N/A' }}
                        </p>

                        <ul class="py-6 flex items-center list-none">
                            <li class="flex items-center lg:me-6 me-4">
                                <i class="mdi mdi-account-group lg:text-3xl text-2xl me-2 text-green-600"></i>
                                <span class="lg:text-xl">{{ $hebergement->capaciteMax }} personnes</span>
                            </li>
                            <li class="flex items-center lg:me-6 me-4">
                                <i class="mdi mdi-bed lg:text-3xl text-2xl me-2 text-green-600"></i>
                                <span class="lg:text-xl">{{ $hebergement->nombreChambres }} chambres</span>
                            </li>
                            <li class="flex items-center">
                                <i class="mdi mdi-shower lg:text-3xl text-2xl me-2 text-green-600"></i>
                                <span class="lg:text-xl">{{$hebergement->nombreSallesDeBain}} salles de bain</span> <!-- Remplacer par nombreSallesDeBain si ajouté -->
                            </li>
                        </ul>

                        <p class="text-slate-400">{!! $hebergement->description ?? 'Aucune description disponible pour cet hébergement.' !!}</p>

                        <!-- Équipements -->
                        @if ($hebergement->equipements->count() > 0)
                            <h5 class="text-xl font-medium mt-6">Équipements</h5>
                            <ul class="list-disc list-inside text-slate-400 mt-2">
                                @foreach ($hebergement->equipements as $equipement)
                                    <li>{{ $equipement->nom }}</li>
                                @endforeach
                            </ul>
                        @else
                            <h5 class="text-xl font-medium mt-6">Aucun</h5>
                        @endif

                        <!-- Carte Google Maps -->
                        @if ($hebergement->localisation && $hebergement->localisation->latitude && $hebergement->localisation->longitude)
                            <div class="w-full leading-[0] border-0 mt-6">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10000!2d{{ $hebergement->localisation->longitude }}!3d{{ $hebergement->localisation->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z{{ urlencode($hebergement->localisation->adresse) }}!5e0!3m2!1sen!2sus!4v1635098765432!5m2!1sen!2sus"
                                    style="border:0"
                                    class="w-full h-[500px]"
                                    allowfullscreen
                                    loading="lazy"
                                ></iframe>
                            </div>
                        @else
                            <p class="text-slate-400 mt-6">Aucune carte disponible pour cette localisation.</p>
                        @endif
                    </div>
                </div>

                <!-- Section prix et actions -->
                <div class="lg:col-span-4">
                    <div class="rounded-md bg-white shadow">
                        <div class="p-6">
                            <h5 class="text-2xl font-medium">Prix</h5>

                            <div class="flex justify-between items-center mt-4">
                                <span class="text-xl font-medium">
                                    {{ number_format($hebergement->prixParNuit, 0, ',', ' ') }} {{ $hebergement->devise }} / nuit
                                </span>
                                <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.75 rounded h-6">
                                    {{ $hebergement->statut === 'actif' ? 'Disponible' : 'Indisponible' }}
                                </span>
                            </div>

                            <ul class="list-none mt-4">
                                <li class="flex justify-between items-center">
                                    <span class="text-slate-400 text-sm">Note moyenne</span>
                                    <span class="font-medium text-sm">
                                        {{ number_format($hebergement->noteMoyenne, 1) }} ({{ $hebergement->avis->count() }} avis)
                                    </span>
                                </li>
                                <li class="flex justify-between items-center mt-2">
                                    <span class="text-slate-400 text-sm">Type</span>
                                    <span class="font-medium text-sm">{{ $hebergement->type->nomType ?? 'N/A' }}</span>
                                </li>
                                <li class="flex justify-between items-center mt-2">
                                    <span class="text-slate-400 text-sm">Heure d'arrivée</span>
                                    <span class="font-medium text-sm">{{ $hebergement->heureArrivee ?? 'N/A' }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="flex">
                            <div class="p-1 w-1/2">
                                <a href="{{route('partenaire.hebergement-detail.edit', ['id' => $hebergement->id])}}" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Modifier</a>
                            </div>
                            <div class="p-1 w-1/2">
                                {{-- <form action="{{route('partenaire.hebergement.destroy', ['id' => $hebergement->idHebergement])}}" method="post">
                                @csrf
                                @method('DELETE') --}}
                                    <button type="submit" id="open-delete-modal" class="btn bg-red-700 hover:bg-red-700 text-white rounded-md w-full">Supprimer</button>
                                {{-- </form> --}}

                            </div>
                        </div>
                    </div>

                    <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg p-6 w-full max-w-md">
                            <h3 class="text-lg font-semibold mb-4">Confirmer la suppression</h3>
                            <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer l'hébergement "{{ $hebergement->nom }}" ? Cette action est irréversible.</p>
                            <form action="{{ route('partenaire.hebergement.destroy', $hebergement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end space-x-4">
                                    <button type="button" id="close-delete-modal" class="btn bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2">Annuler</button>
                                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white rounded-md px-4 py-2">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="mt-12 text-center">
                        <h3 class="mb-6 text-xl leading-normal font-medium text-black">Une question ? Contactez-nous !</h3>
                        <div class="mt-6">
                            <a href="#" class="btn bg-transparent hover:bg-green-600 border border-green-600 text-green-600 hover:text-white rounded-md">
                                <i class="mdi mdi-phone align-middle me-2"></i> Nous contacter
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>

    <script>
        const openModalBtn = document.getElementById('open-delete-modal');
                const closeModalBtn = document.getElementById('close-delete-modal');
                const deleteModal = document.getElementById('delete-modal');

                openModalBtn.addEventListener('click', () => {
                    deleteModal.classList.remove('hidden');
                });

                closeModalBtn.addEventListener('click', () => {
                    deleteModal.classList.add('hidden');
                });

                // Fermer le modal en cliquant à l'extérieur
                deleteModal.addEventListener('click', (e) => {
                    if (e.target === deleteModal) {
                        deleteModal.classList.add('hidden');
                    }
                });

    </script>
@endsection
