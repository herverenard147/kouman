
{{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6"> --}}
    @forelse ($hebergements as $hebergement)
        <div class="group rounded-xl bg-white shadow-md hover:shadow-xl overflow-hidden transition-all duration-300">
            <!-- Image -->
            <div class="relative">
                @php
                    // Image principale (préférablement chargée via Eloquent)
                    $imagePrincipale = $hebergement->imagePrincipale ?? $hebergement->images->first();
                @endphp

                <img
                    src="{{ $imagePrincipale ? asset('imageDes/uploads/' . $imagePrincipale->url) : asset('images/no-image.png') }}"
                    alt="Image de {{ $hebergement->nom }} à {{ $hebergement->localisation->ville ?? 'N/A' }}"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                >

                <!-- Badge pour le type d'hébergement -->
                <span class="absolute top-2 left-2 bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded">
                    {{ $hebergement->type->nomType ?? 'Hébergement' }}
                </span>

                <!-- Bouton favoris -->
                <div class="absolute top-2 right-2">
                    <button
                        type="button"
                        class="btn btn-icon bg-white shadow rounded-full text-gray-500 hover:text-red-600 focus:text-red-600"
                        aria-label="Ajouter aux favoris"
                    >
                        <i class="mdi mdi-heart text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Contenu -->
            <div class="p-5">
                <!-- Nom et lien -->
                <div class="mb-4">
                    <a
                        href="{{ route('partenaire.hebergement-detail.show', ['id' => $hebergement->id]) }}"
                        class="text-lg font-semibold text-gray-800 hover:text-green-600 transition-colors duration-200"
                    >
                        {{ $hebergement->nom }}
                    </a>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $hebergement->localisation->ville ?? 'N/A' }}, {{ $hebergement->localisation->pays ?? 'N/A' }}
                    </p>
                </div>

                <!-- Caractéristiques -->
                <ul class="flex items-center gap-4 text-sm text-gray-600 border-y border-gray-200 py-4">
                    <li class="flex items-center">
                        <i class="mdi mdi-bed text-lg text-green-600 mr-1"></i>
                        {{ $hebergement->nombreChambres }} chambre{{ $hebergement->nombreChambres > 1 ? 's' : '' }}
                    </li>
                    <li class="flex items-center">
                        <i class="mdi mdi-account-group text-lg text-green-600 mr-1"></i>
                        {{ $hebergement->capaciteMax }} pers.
                    </li>
                    @if ($hebergement->heureArrivee)
                        <li class="flex items-center">
                            <i class="mdi mdi-clock-in text-lg text-green-600 mr-1"></i>
                            {{ $hebergement->heureArrivee }}
                        </li>
                    @endif
                </ul>

                <!-- Prix et note -->
                <div class="flex justify-between items-center mt-4">
                    <!-- Prix -->
                    <div>
                        <span class="text-xs text-gray-400">Prix par nuit</span>
                        <p class="text-lg font-semibold text-gray-800">
                            {{ number_format($hebergement->prixParNuit, 0, ',', ' ') }} {{ $hebergement->devise }}
                        </p>
                    </div>

                    <!-- Note -->
                    <div class="text-right">
                        <span class="text-xs text-gray-400">Note</span>
                        <div class="flex items-center">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="mdi mdi-star text-base {{ $i < floor($hebergement->noteMoyenne) ? 'text-amber-400' : 'text-gray-300' }}"></i>
                            @endfor
                            <span class="text-sm text-gray-800 ml-1">
                                {{ number_format($hebergement->noteMoyenne, 1) }} ({{ $hebergement->avis->count() }})
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-10">
            <p class="text-gray-500 text-lg">Aucun élément disponible pour le moment.</p>
        </div>
    @endforelse
{{-- </div> --}}
