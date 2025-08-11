@extends('layout.base')
@section('title', 'Modifier la chambre')
@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->

            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Modifier la chambre : {{ $hebergement->nom }}</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    {{-- Lien de fil d'Ariane normal: S'adapte au mode sombre --}}
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                        <a href="{{route('partenaire.dashboard')}}">Afrique évasion</a>
                    </li>
                    {{-- Séparateur de fil d'Ariane: S'adapte au mode sombre --}}
                    <li class="inline-block text-base text-slate-950 dark:text-gray-400 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="mdi mdi-chevron-right"></i>
                    </li>
                    {{-- Élément actif du fil d'Ariane: La couleur verte est déjà bien contrastée --}}
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Modifier la chambre</li>
                </ul>
            </div>

            @if(session('success'))
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
            <form id="form-hebergement"
            action="{{ route('partenaire.hebergement-detail.update', $hebergement->id) }}"
            method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full md:w-3/4 mx-auto">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
                        <div class="md:col-span-12 col-span-12">
                            <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit mb-5">

                                <div>

                                    <p class="font-medium text-slate-900 dark:text-white mb-4">Téléchargez les images de votre propriété (max 10 images, 10MB chacune, JPG/PNG)</p>
                                    <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 p-4 rounded-md shadow-inner text-center text-slate-400">
                                        @if($hebergement->images->isEmpty())
                                            Supports JPG et PNG. Taille max : 10MB.
                                        @else
                                            @foreach($hebergement->images as $index => $image)
                                                <div class="relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview" data-image-id="{{ $image->id }}">
                                                    <button type="button" class="absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 mark-delete-image" data-image-id="{{ $image->id }}">✕</button>
                                                    <img src="{{ asset('imageDes/uploads/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-auto object-cover rounded">
                                                    <input type="hidden" name="images_to_keep[{{ $image->id }}]" value="1" class="image-keep-input">
                                                    @if($index === 0 && !$image->estSupprime)
                                                        <span class="absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge">Principale</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif

                                        <!-- Conteneur pour les nouvelles images -->
                                        <div id="new-images-preview" class="flex flex-wrap gap-4"></div>
                                    </div>
                                    <p class="font-medium mb-4 text-slate-900 dark:text-white"> <strong>NB:</strong> La première image sera votre image principale. <br> Vous ne Pouvez Téléverser que 10 images.</p>
                                    <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png,image/jpg,image/mp4" multiple class="hidden" onchange="handleImageChange()">
                                    <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer">
                                        Ajouter des images
                                    </label>
                                    <!-- Conteneur pour les erreurs JavaScript -->
                                    <div id="image-errors" class="text-red-600 text-sm mt-2"></div>
                                    <!-- Erreurs Laravel -->
                                    @error('images.*')
                                        <span class="text-red-600 text-sm block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @error('images.*')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-12 col-span-12">
                            <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12">
                                        <label for="nom" class="font-medium text-slate-900 dark:text-white text-slate-900 dark:text-white">Nom :</label>
                                        <input name="nom" id="nom" type="text" class="form-input mt-2 @error('nom') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Nom de la chambre" value="{{ old('nom', $hebergement->nom) }}" required>
                                        @error('nom')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="familyType">Famille de la chambre <strong>*</strong>:</label>
                                        <select name="familyType" id="familyType" class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('familyType') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                            <option value="" disabled {{ old('familyType', $hebergement->type->idFamilleType) ? '' : 'selected' }}>-- Sélectionner une famille --</option>
                                            @foreach($familles as $famille)
                                                <option value="{{ $famille->id }}" {{ old('familyType', $hebergement->type->idFamilleType) == $famille->idFamilleType ? 'selected' : '' }}>
                                                    {{ $famille->nomFamille }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('familyType')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="idType">Type de la chambre <strong>*</strong>:</label>
                                        <select name="idType" id="typePartenaire" class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('idType') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                            <option value="" disabled>-- Sélectionner un type --</option>
                                        </select>
                                        @error('idType')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-span-12">
                                        <label for="description" class="font-medium text-slate-900 dark:text-white">Description :</label>
                                        <textarea name="description" id="description" rows="5" class="form-input mt-2 @error('description') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Décrivez votre chambre...">{{ old('description', $hebergement->description) }}</textarea>
                                        @error('description')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="prixParNuit" class="font-medium text-slate-900 dark:text-white">Prix par nuit :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-currency-dollar absolute top-2 start-4 text-green-600"></i>
                                            <input name="prixParNuit" id="prixParNuit" type="number" step="0.01" class="form-input ps-11 @error('prixParNuit') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="0.00" value="{{ old('prixParNuit',$hebergement->prixParNuit) }}">
                                        </div>
                                        @error('prixParNuit')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="stock" class="font-medium text-slate-900 dark:text-white">Stock :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-currency-dollar absolute top-2 start-4 text-green-600"></i>
                                            <input name="stock" id="stock" type="number" step="0.01" class="form-input ps-11 @error('stock') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="0.00" value="{{ old('stock',$hebergement->stock) }}">
                                        </div>
                                        @error('stock')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="devise" class="font-medium text-slate-900 dark:text-white">Devise :</label>
                                        <select name="devise" id="devise" class="form-select w-full border border-gray-300 rounded-md p-2 @error('devise') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" required>
                                            <option value="CFA" {{ old('devise', $hebergement->devise) == 'CFA' ? 'selected' : '' }}>CFA (CFA)</option>
                                            <option value="EUR" {{ old('devise', $hebergement->devise) == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                                            <option value="USD" {{ old('devise', $hebergement->devise) == 'USD' ? 'selected' : '' }}>USD ($)</option>
                                            <option value="GBP" {{ old('devise', $hebergement->devise) == 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                                            <option value="CAD" {{ old('devise', $hebergement->devise) == 'CAD' ? 'selected' : '' }}>CAD (C$)</option>
                                            <option value="AUD" {{ old('devise', $hebergement->devise) == 'AUD' ? 'selected' : '' }}>AUD (A$)</option>
                                        </select>
                                        @error('devise')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="idPolitiqueAnnulation" class="font-medium text-slate-900 dark:text-white">Politique d'annulation :</label>
                                        <select name="idPolitiqueAnnulation" id="politiqueAnnulation" class="form-select w-full border border-gray-300 rounded-md p-2 @error('idPolitiqueAnnulation') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600">
                                            <option value="{{ $hebergement->idPolitiqueAnnulation }}" selected>{{ $hebergement->politiqueAnnulation->nom ?? 'aucun' }}</option>
                                            @foreach($politiques as $politique)
                                                <option value="{{ $politique->id }}" {{ old('idPolitiqueAnnulation', $hebergement->idPolitiqueAnnulation) == $politique->id ? 'selected' : '' }}>{{ $politique->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('idPolitiqueAnnulation')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="ville" class="font-medium text-slate-900 dark:text-white">Ville :</label>
                                        <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Ville" value="{{ old('ville', $hebergement->localisation->ville) }}">
                                        @error('ville')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="pays" class="font-medium text-slate-900 dark:text-white">Pays :</label>
                                        <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Pays" value="{{ old('pays', $hebergement->localisation->pays) }}">
                                        @error('pays')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="adresse" class="font-medium text-slate-900 dark:text-white">Adresse :</label>
                                        {{-- <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse')" placeholder="Adresse complète" value="{{ oldValue }}"> --}}
                                        <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Adresse complète" value="{{ old('adresse', $hebergement->localisation->adresse) }}">
                                        @error('adresse')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="latitude" class="font-medium text-slate-900 dark:text-white">Latitude :</label>
                                        <input name="latitude" id="latitude" type="number" step="0.000001" class="form-input mt-2 @error('latitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Latitude" value="{{ old('latitude', $hebergement->localisation->latitude) }}">
                                        @error('latitude')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="longitude" class="font-medium text-slate-900 dark:text-white">Longitude :</label>
                                        <input name="longitude" id="longitude" type="number" step="0.000001" class="form-input mt-2 @error('longitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Longitude" value="{{ old('longitude', $hebergement->localisation->longitude) }}">
                                        @error('longitude')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12 flex justify-center items-center">
                                        <button type="button" onclick="openMapPopup()" class="btn bg-green-600 text-white rounded-md px-4 py-2 hover:bg-green-700">
                                            Ajouter ma localisation
                                        </button>
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="codePostal" class="font-medium text-slate-900 dark:text-white">Code postal :</label>
                                        <input name="codePostal" id="codePostal" type="text" class="form-input mt-2 @error('codePostal') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Code postal" value="{{ old('codePostal', $hebergement->localisation->codePostal) }}">
                                        @error('codePostal')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="nombreChambres" class="font-medium text-slate-900 dark:text-white">Nombre de chambres :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-door-open absolute top-3 start-4 text-green-600"></i>
                                            <input name="nombreChambres" id="nombreChambres" type="number" class="form-input ps-11 @error('nombreChambres') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="0" value="{{ old('nombreChambres', $hebergement->nombreChambres) }}">
                                        </div>
                                        @error('nombreChambres')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="nombreSallesDeBain" class="font-medium text-slate-900 dark:text-white">Nombre de salles de bain :</label>
                                        <input name="nombreSallesDeBain" id="nombreSallesDeBain" type="number" class="form-input mt-2 @error('nombreSallesDeBain') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" value="{{ old('nombreSallesDeBain', $hebergement->nombreSallesDeBain) }}">
                                        @error('nombreSallesDeBain')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="capaciteMax" class="font-medium text-slate-900 dark:text-white">Capacité maximum :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-person absolute top-3 start-4 text-green-600"></i>
                                            <input name="capaciteMax" id="capaciteMax" type="number" class="form-input ps-11 @error('capaciteMax') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="1" value="{{ old('capaciteMax', $hebergement->capaciteMax) }}">
                                        </div>
                                        @error('capaciteMax')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="heureArrivee" class="font-medium text-slate-900 dark:text-white">Heure de check-in :</label>
                                        <input name="heureArrivee" id="heureArrivee" type="time"
                                            class="form-input mt-2 @error('heureArrivee') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600"
                                            value="{{ old('heureArrivee', $hebergement->heureArrivee ? \Carbon\Carbon::parse($hebergement->heureArrivee)->format('H:i') : '') }}">
                                        @error('heureArrivee')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="heureDepart" class="font-medium text-slate-900 dark:text-white">Heure de check-out :</label>
                                        <input name="heureDepart" id="heureDepart" type="time"
                                            class="form-input mt-2 @error('heureDepart') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600"
                                            value="{{ old('heureDepart', $hebergement->heureDepart ? \Carbon\Carbon::parse($hebergement->heureDepart)->format('H:i') : '') }}">
                                        @error('heureDepart')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @php
                                        $equipementsSelectionnes = old('equipements', $hebergement->equipements->pluck('id')->toArray() ?? []);
                                    @endphp

                                    <div class="col-span-12">
                                        <label class="font-medium text-slate-900 dark:text-white">Équipements :</label>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            @foreach($equipements as $equipement)
                                                <div class="flex items-center">
                                                    <input
                                                        type="checkbox"
                                                        name="equipements[]"
                                                        id="equipement_{{ $equipement->id }}"
                                                        value="{{ $equipement->id }}"
                                                        class="form-checkbox @error('equipements') border-red-500 @enderror "
                                                        {{ in_array($equipement->id, $equipementsSelectionnes) ? 'checked' : '' }}
                                                    >
                                                    <label for="equipement_{{ $equipement->id }}" class="ms-2 font-medium text-slate-900 dark:text-white">{{ $equipement->nom }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('equipements')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-12">
                                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Numéros de téléphone :</label>
                                        <div id="telephones-container">
                                            @php $oldTelephones = old('telephones', $hebergement->telephones->toArray()); @endphp

                                            @foreach ($oldTelephones as $index => $tel)
                                                <div class="grid grid-cols-12 gap-2 mb-2">
                                                    <div class="md:col-span-4 col-span-4">
                                                        <input name="telephones[{{ $index }}][numero]"
                                                            type="text"
                                                            class="form-input @error("telephones.$index.numero") border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600"
                                                            placeholder="+2250700000000"
                                                            value="{{ old("telephones.$index.numero", $tel['numero'] ?? '') }}">
                                                        @error("telephones.$index.numero")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="md:col-span-2 col-span-2 flex items-center">
                                                        <button type="button" class="remove-telephone btn bg-white dark:bg-slate-700 text-red-600 border border-red-300 dark:border-red-600 hover:bg-red-50 dark:hover:bg-red-800 rounded-md px-2 py-1 w-full">
                                                            Supprimer
                                                        </button>
                                                    </div>
                                                    {{-- Ici tu peux ajouter un bouton de suppression si tu veux --}}
                                                </div>
                                            @endforeach
                                        </div>

                                        <button type="button" id="add-telephone" class="btn bg-white dark:bg-slate-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-slate-600 rounded-md mt-2">
                                            Ajouter un numéro
                                        </button>
                                    </div>


                                    <div class="col-span-12">
                                        <label class="font-medium text-slate-900 dark:text-white">Prix saisonniers (optionnel) :</label>
                                        <div id="prix-saisonniers-container">
                                            @php $prixSaisonniers = old('prixSaisonniers', $hebergement->prixSaisonniers ?? [[]]); @endphp

                                            @foreach($prixSaisonniers as $i => $saisonnier)
                                                <div class="grid grid-cols-12 gap-2 mb-2">
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-medium text-slate-900 dark:text-white block mb-2">Date de début :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][dateDebut]" placeholder="Date de début" type="date" class="form-input @error("prixSaisonniers.$i.dateDebut") border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" value="{{ old("prixSaisonniers.$i.dateDebut", $saisonnier['dateDebut'] ?? '') }}">
                                                        @error("prixSaisonniers.$i.dateDebut")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-medium text-slate-900 dark:text-white block mb-2">Date de fin :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][dateFin]" placeholder="Date de fin" type="date" class="form-input @error("prixSaisonniers.$i.dateFin") border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" value="{{ old("prixSaisonniers.$i.dateFin", $saisonnier['dateFin'] ?? '') }}">
                                                        @error("prixSaisonniers.$i.dateFin")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-medium text-slate-900 dark:text-white block mb-2">Prix par nuit :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][prixParNuit]" type="number" placeholder="Prix par nuit" step="0.01" class="form-input @error("prixSaisonniers.$i.prixParNuit") border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" value="{{ old("prixSaisonniers.$i.prixParNuit", $saisonnier['prixParNuit'] ?? '') }}">
                                                        @error("prixSaisonniers.$i.prixParNuit")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <button type="button" id="add-prix-saison" class="btn bg-white text-gray-800 border border-gray-300 hover:bg-gray-100 rounded-md mt-2">
                                            Ajouter une période
                                        </button>
                                    </div>
                                    <div class="md:col-span-12 col-span-12 flex justify-end space-x-4">
                                        <a href="{{route('partenaire.hebergement-detail.show', ['id' => $hebergement->id])}}" class="btn bg-red-700 hover:bg-red-600 text-white rounded-md px-4 py-2">Annuler</a>
                                        <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md px-4 py-2">Mettre à jour</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Content -->
        </div>
    </div><!--end container-->
</div>
 <script>
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-telephone')) {
            e.target.closest('.grid').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('form-hebergement'); // <--- formulaire
    const selectedFiles = [];
    const maxImages = 10;
    const maxSize = 10 * 1024 * 1024; // 10MB

    const previewBox = document.getElementById('preview-box'); // images existantes
    const newImagesPreview = document.getElementById('new-images-preview'); // nouvelles images uploadées
    const inputFile = document.getElementById('input-file');
    const errorContainer = document.getElementById('image-errors');

    if (!form || !inputFile || !previewBox || !newImagesPreview) return;

    inputFile.addEventListener('change', handleImageChange);
    form.addEventListener('submit', (e) => {
        injectFilesToForm();
        console.log('Fichiers envoyés au backend :', [...inputFile.files]); // Vérification console
    });

    initExistingImageDeletion();
    updatePrincipalBadge();

    function handleImageChange() {
        const newFiles = Array.from(inputFile.files);
        const existingCount = previewBox.querySelectorAll('.image-preview:not(.marked-deleted)').length;
        const errors = [];

        const validFiles = newFiles.filter(file => {
            if (selectedFiles.some(f => f.name === file.name && f.size === file.size)) {
                errors.push(`Le fichier "${file.name}" est déjà sélectionné.`);
                return false;
            }
            if (!['image/jpeg', 'image/png', 'image/jpg', 'image/mp4'].includes(file.type)) {
                errors.push(`Le fichier "${file.name}" doit être au format JPG, PNG ou MP4.`);
                return false;
            }
            if (file.size > maxSize) {
                errors.push(`Le fichier "${file.name}" dépasse la taille maximale de 10MB.`);
                return false;
            }
            return true;
        });

        if (existingCount + selectedFiles.length + validFiles.length > maxImages) {
            const allowedCount = maxImages - existingCount - selectedFiles.length;
            if (allowedCount > 0) {
                validFiles.splice(allowedCount);
                errors.push(`Seules les ${allowedCount} premières images valides ont été ajoutées (limite de ${maxImages} images).`);
            } else {
                errors.push(`La limite de ${maxImages} images est atteinte.`);
                validFiles.length = 0;
            }
        }

        displayErrors(errors);

        validFiles.forEach(file => {
            selectedFiles.push(file);
            addNewImagePreview(file);
        });

        updateInputFiles();
        inputFile.value = '';
    }

    // Prévisualisation des nouvelles images (uploadées)
    function addNewImagePreview(file) {
        const wrapper = document.createElement('div');
        wrapper.className = 'relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview';
        wrapper.dataset.index = selectedFiles.length - 1;

        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '✕';
        deleteBtn.className = 'absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600';
        deleteBtn.type = 'button';

        const img = document.createElement('img');
        img.className = 'w-full h-auto object-cover rounded';
        img.src = URL.createObjectURL(file);
        img.onload = () => URL.revokeObjectURL(img.src);

        wrapper.appendChild(deleteBtn);
        wrapper.appendChild(img);
        newImagesPreview.appendChild(wrapper);

        deleteBtn.addEventListener('click', () => {
            const index = parseInt(wrapper.dataset.index);
            selectedFiles.splice(index, 1);
            wrapper.remove();

            updateNewPreviewIndices();
            updatePrincipalBadge();
            updateInputFiles();
        });

        updatePrincipalBadge();
    }

    function updateNewPreviewIndices() {
        const wrappers = newImagesPreview.querySelectorAll('.image-preview');
        wrappers.forEach((wrapper, index) => {
            wrapper.dataset.index = index;
        });
    }

    function updatePrincipalBadge() {
        previewBox.querySelectorAll('.principal-badge').forEach(badge => badge.remove());
        newImagesPreview.querySelectorAll('.principal-badge').forEach(badge => badge.remove());

        const firstExisting = previewBox.querySelector('.image-preview:not(.marked-deleted)');
        if (firstExisting) {
            const principalBadge = document.createElement('span');
            principalBadge.className = 'absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge';
            principalBadge.textContent = 'Principale';
            firstExisting.appendChild(principalBadge);
        } else {
            const firstNew = newImagesPreview.querySelector('.image-preview');
            if (firstNew) {
                const principalBadge = document.createElement('span');
                principalBadge.className = 'absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge';
                principalBadge.textContent = 'Principale';
                firstNew.appendChild(principalBadge);
            }
        }
    }

    function injectFilesToForm() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        inputFile.files = dataTransfer.files;
    }

    function displayErrors(errors) {
        errorContainer.innerHTML = '';
        if (errors.length > 0) {
            const ul = document.createElement('ul');
            ul.className = 'list-disc pl-5';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                ul.appendChild(li);
            });
            errorContainer.appendChild(ul);
        }
    }

    function initExistingImageDeletion() {
    // Ajoute un listener à chaque bouton de suppression
    document.querySelectorAll('.mark-delete-image').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const preview = this.closest('.image-preview'); // Trouve le bon conteneur
            const input = preview.querySelector('.image-keep-input');

            if (preview.classList.contains('marked-deleted')) {
                // On annule la suppression
                preview.classList.remove('marked-deleted', 'opacity-50');
                input.value = '1';
                this.textContent = '✕';
            } else {
                // On marque pour suppression
                preview.classList.add('marked-deleted', 'opacity-50');
                input.value = '0';
                this.textContent = '↩';
            }

            updatePrincipalBadge();
        });
    });
}
});


    let prixSaisonnierIndex = 1; // On commence à 1 car le bloc 0 est déjà présent

    document.getElementById('add-prix-saison').addEventListener('click', function () {
        const container = document.getElementById('prix-saisonniers-container');

        // Créer un nouveau bloc HTML avec les bons noms
        const newBlock = document.createElement('div');
        newBlock.className = 'grid grid-cols-12 gap-2 mb-2';
        newBlock.innerHTML = `
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][dateDebut]" type="date" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Date de début">
                </div>
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][dateFin]" type="date" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Date de fin">
                </div>
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][prixParNuit]" type="number" step="0.01" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Prix par nuit">
                </div>
                <div class="md:col-span-3 col-span-12">
                    <button type="button" class="remove-block btn text-red-600 border border-red-300 hover:bg-red-50 rounded-md px-2 py-1 w-full">
                        retirer
                    </button>
                </div>
        `;

        container.appendChild(newBlock);
        prixSaisonnierIndex++;
    });

    // Gestion du clic sur les boutons "✕"
    document.getElementById('prix-saisonniers-container').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-block')) {
            const row = e.target.closest('.grid');
            if (row) row.remove();
        }
    });

    let telephoneIndex = 1;

    document.getElementById('add-telephone').addEventListener('click', function () {
        const container = document.getElementById('telephones-container');
        const newBlock = document.createElement('div');
        newBlock.className = 'grid grid-cols-12 gap-2 mb-2 telephone-item'; // Added telephone-item class
        newBlock.innerHTML = `
            <div class="md:col-span-4 col-span-10">
                <input name="telephones[${telephoneIndex}][numero]" type="text" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="+2250700000000">
            </div>
            <div class="md:col-span-2 col-span-2">
                <button type="button" class="remove-telephone btn bg-white dark:bg-slate-700 text-red-600 border border-red-300 dark:border-red-600 hover:bg-red-50 dark:hover:bg-red-800 rounded-md px-2 py-1 w-full">✕</button>
            </div>
        `;
        container.appendChild(newBlock);
        telephoneIndex++;
    });

    // Event listener for removing telephone fields
    document.getElementById('telephones-container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-telephone')) {
                e.target.closest('.telephone-item').remove();
            }
        });

    const familyTypeSelect = document.getElementById('familyType');
    const typePartenaireSelect = document.getElementById('typePartenaire');
    const selectedTypeId = "{{ old('idType', $hebergement->type->id) }}";

    function updateTypePartenaireDropdown() {
        const familyType = familyTypeSelect.value;

        typePartenaireSelect.innerHTML = '<option value="" disabled selected>Chargement...</option>';
        typePartenaireSelect.disabled = true;

        if (!familyType) {
            typePartenaireSelect.innerHTML = '<option value="" disabled selected>-- Sélectionner un type --</option>';
            typePartenaireSelect.disabled = false;
            return;
        }

        fetch(`/partenaire/add/types-par-famille/${familyType}`)
            .then(response => response.json())
            .then(data => {
                typePartenaireSelect.innerHTML = '<option value="" disabled>-- Sélectionner un type --</option>';

                data.forEach(type => {
                    const option = document.createElement('option');
                    option.value = type.id;
                    option.textContent = type.nomType;

                    if (String(type.id) === String(selectedTypeId)) {
                        option.selected = true;
                    }

                    typePartenaireSelect.appendChild(option);
                });

                typePartenaireSelect.disabled = false;
            })
            .catch(error => {
                console.error('Erreur de chargement des types :', error);
                typePartenaireSelect.innerHTML = '<option disabled selected>Erreur de chargement</option>';
                typePartenaireSelect.disabled = false;
            });
    }

    // Lancement au changement de famille
    familyTypeSelect.addEventListener('change', updateTypePartenaireDropdown);

    // Initialisation au chargement de la page
    document.addEventListener('DOMContentLoaded', () => {
        updateTypePartenaireDropdown();
    });

        function openMapPopup() {
            const width = 600;
            const height = 500;
            const left = (screen.width / 2) - (width / 2);
            const top = (screen.height / 2) - (height / 2);

            const mapWindow = window.open(
                "/partenaire/popup-localisation", // à créer dans Laravel
                "Localisation",
                `width=${width},height=${height},top=${top},left=${left}`
            );
            window.addEventListener('message', function (event) {
                if (event.origin !== window.location.origin) return;

                const { latitude, longitude, adresse, ville, pays } = event.data;

                console.log("📦 Données reçues :", event.data); // 👀 ici tu verras tout

                // Assure-toi que latitude/longitude sont bien définies
                if (latitude !== undefined && longitude !== undefined) {
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                }

                if (adresse) document.getElementById('adresse').value = adresse;
                if (ville) document.getElementById('ville').value = ville;
                if (pays) document.getElementById('pays').value = pays;
            });
        }

</script>


<!-- JAVASCRIPTS -->
@endsection
