@extends('layout.base')
@section('title', 'Modifier l\'hébergement')
@section('content')

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->

            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Modifier l'hébergement : {{ $hebergement->nom }}</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600"><a href="{{route('partenaire.dashboard')}}">Afica évasion</a></li>
                    <li class="inline-block text-base text-slate-950 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Ajouter un hebergement</li>
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
            <form action="{{ route('partenaire.hebergement-detail.update', $hebergement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container relative">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
                        <div class="md:col-span-12 col-span-12">
                            <div class="rounded-md shadow p-6 bg-white h-fit mb-5">
                                {{-- <div class="relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview" data-image-id="{{ $image->idImage }}">
                                    <button type="button" class="absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 mark-delete-image" data-image-id="{{ $image->idImage }}">✕</button>
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-auto object-cover rounded">
                                    <input type="hidden" name="images_to_keep[{{ $image->idImage }}]" value="1" class="image-keep-input">
                                    @if($image->estPrincipale)
                                        <span class="absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded">Principale</span>
                                    @endif
                                </div> --}}
                                <div>
                                    {{-- <p class="font-medium mb-4">Téléchargez l'image de votre propriété ici (max 10 images, 10MB chacun)</p>

                                    <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 p-4 rounded-md shadow-inner text-center text-slate-400">
                                        @if($hebergement->images->isEmpty())
                                            Supports JPG et PNG. Taille max : 10MB.
                                        @else
                                            @foreach($hebergement->images as $index => $image)
                                                <div class="relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview" data-image-id="{{ $image->idImage }}">
                                                    <button type="button" class="absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 mark-delete-image" data-image-id="{{ $image->idImage }}">✕</button>
                                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-auto object-cover rounded">
                                                    <input type="hidden" name="images_to_keep[{{ $image->idImage }}]" value="1" class="image-keep-input">
                                                    @if($index === 0 && !$image->estSupprime)
                                                        <span class="absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge">Principale</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                        <!-- Conteneur pour les nouvelles images -->
                                        <div id="new-images-preview" class="flex flex-wrap gap-4"></div>
                                    </div>

                                    <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png" multiple hidden onchange="handleImageChange()">
                                    <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer">
                                        Ajouter des images
                                    </label> --}}
                                    <p class="font-medium mb-4">Téléchargez les images de votre propriété (max 10 images, 10MB chacune, JPG/PNG)</p>
                                    <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 p-4 rounded-md shadow-inner text-center text-slate-400">
                                        @if($hebergement->images->isEmpty())
                                            Supports JPG et PNG. Taille max : 10MB.
                                        @else
                                            @foreach($hebergement->images as $index => $image)
                                                <div class="relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview" data-image-id="{{ $image->idImage }}">
                                                    <button type="button" class="absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600 mark-delete-image" data-image-id="{{ $image->idImage }}">✕</button>
                                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image de {{ $hebergement->nom }}" class="w-full h-auto object-cover rounded">
                                                    <input type="hidden" name="images_to_keep[{{ $image->idImage }}]" value="1" class="image-keep-input">
                                                    @if($index === 0 && !$image->estSupprime)
                                                        <span class="absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge">Principale</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                        <!-- Conteneur pour les nouvelles images -->
                                        <div id="new-images-preview" class="flex flex-wrap gap-4"></div>
                                    </div>
                                    <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png" multiple class="hidden" onchange="handleImageChange()">
                                    <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer inline-block">
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
                            <div class="rounded-md shadow p-6 bg-white h-fit">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12">
                                        <label for="nom" class="font-medium">Nom :</label>
                                        <input name="nom" id="nom" type="text" class="form-input mt-2 @error('nom') border-red-500 @enderror" placeholder="Nom de l'hébergement" value="{{ old('nom', $hebergement->nom) }}" required>
                                        @error('nom')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label class="font-semibold block mb-2" for="familyType">Famille d'hébergement :</label>
                                        <select name="familyType" id="familyType" class="form-select w-full border border-gray-300 rounded-md p-2 @error('familyType') border-red-500 @enderror" required>
                                            <option value="" disabled {{ old('familyType', $hebergement->type->idFamilleType) ? '' : 'selected' }}>-- Sélectionner une famille --</option>
                                            @foreach($familles as $famille)
                                                <option value="{{ $famille->idFamilleType }}" {{ old('familyType', $hebergement->type->idFamilleType) == $famille->idFamilleType ? 'selected' : '' }}>{{ $famille->nomFamille }}</option>
                                            @endforeach
                                        </select>
                                        @error('familyType')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label class="font-semibold block mb-2" for="idType">Type d'hébergement :</label>
                                        <select name="idType" id="typePartenaire" class="form-select w-full border border-gray-300 rounded-md p-2 @error('idType') border-red-500 @enderror" required>
                                            <option value="{{ old('idType', $hebergement->type->nomType) }}" disabled {{ old('idType', $hebergement->type->idType) ? '' : 'selected' }}>{{ $hebergement->type->nomType }}</option>
                                        </select>
                                        @error('idType')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-12">
                                        <label for="description" class="font-medium">Description :</label>
                                        <textarea name="description" id="description" rows="5" class="form-input mt-2 @error('description') border-red-500 @enderror" placeholder="Décrivez votre hébergement...">{{ old('description', $hebergement->description) }}</textarea>
                                        @error('description')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="prixParNuit" class="font-medium">Prix par nuit :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-currency-dollar absolute top-2 start-4 text-green-600"></i>
                                            <input name="prixParNuit" id="prixParNuit" type="number" step="0.01" class="form-input ps-11 @error('prixParNuit') border-red-500 @enderror" placeholder="0.00" value="{{ old('prixParNuit',$hebergement->prixParNuit) }}">
                                        </div>
                                        @error('prixParNuit')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="devise" class="font-medium">Devise :</label>
                                        <select name="devise" id="devise" class="form-select w-full border border-gray-300 rounded-md p-2 @error('devise') border-red-500 @enderror" required>
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
                                        <label for="idPolitiqueAnnulation" class="font-medium">Politique d'annulation :</label>
                                        <select name="idPolitiqueAnnulation" id="politiqueAnnulation" class="form-select w-full border border-gray-300 rounded-md p-2 @error('idPolitiqueAnnulation') border-red-500 @enderror">
                                            <option value="{{ $hebergement->idPolitiqueAnnulation }}" selected>{{ $hebergement->politiqueAnnulation->nom ?? 'aucun' }}</option>
                                            @foreach($politiques as $politique)
                                                <option value="{{ $politique->id }}" {{ old('idPolitiqueAnnulation', $hebergement->idPolitiqueAnnulation) == $politique->id ? 'selected' : '' }}>{{ $politique->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('idPolitiqueAnnulation')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label for="ville" class="font-medium">Ville :</label>
                                        <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror" placeholder="Ville" value="{{ old('ville', $hebergement->localisation->ville) }}">
                                        @error('ville')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 col-span-12">
                                        <label for="pays" class="font-medium">Pays :</label>
                                        <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror" placeholder="Pays" value="{{ old('pays', $hebergement->localisation->pays) }}">
                                        @error('pays')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div Saying-md class="col-span-4 col-span-12">
                                        <label for="adresse" class="font-medium">Adresse :</label>
                                        {{-- <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse')" placeholder="Adresse complète" value="{{ oldValue }}"> --}}
                                        <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror" placeholder="Adresse complète" value="{{ old('adresse', $hebergement->localisation->adresse) }}">
                                        @error('adresse')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="codePostal" class="font-medium">Code postal :</label>
                                        <input name="codePostal" id="codePostal" type="text" class="form-input mt-2 @error('codePostal') border-red-500 @enderror" placeholder="Code postal" value="{{ old('codePostal', $hebergement->localisation->codePostal) }}">
                                        @error('codePostal')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="latitude" class="font-medium">Latitude :</label>
                                        <input name="latitude" id="latitude" type="number" step="0.000001" class="form-input mt-2 @error('latitude') border-red-500 @enderror" placeholder="Latitude" value="{{ old('latitude', $hebergement->localisation->latitude) }}">
                                        @error('latitude')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="longitude" class="font-medium">Longitude :</label>
                                        <input name="longitude" id="longitude" type="number" step="0.000001" class="form-input mt-2 @error('longitude') border-red-500 @enderror" placeholder="Longitude" value="{{ old('longitude', $hebergement->localisation->longitude) }}">
                                        @error('longitude')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="nombreChambres" class="font-medium">Nombre de chambres :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-door-open absolute top-3 start-4 text-green-600"></i>
                                            <input name="nombreChambres" id="nombreChambres" type="number" class="form-input ps-11 @error('nombreChambres') border-red-500 @enderror" placeholder="0" value="{{ old('nombreChambres', $hebergement->nombreChambres) }}">
                                        </div>
                                        @error('nombreChambres')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="nombreSallesDeBain" class="font-medium">Nombre de salles de bain :</label>
                                        <input name="nombreSallesDeBain" id="nombreSallesDeBain" type="number" class="form-input mt-2 @error('nombreSallesDeBain') border-red-500 @enderror" value="{{ old('nombreSallesDeBain', $hebergement->nombreSallesDeBain) }}">
                                        @error('nombreSallesDeBain')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="capaciteMax" class="font-medium">Capacité maximum :</label>
                                        <div class="form-icon relative mt-2">
                                            <i class="bi bi-person absolute top-3 start-4 text-green-600"></i>
                                            <input name="capaciteMax" id="capaciteMax" type="number" class="form-input ps-11 @error('capaciteMax') border-red-500 @enderror" placeholder="1" value="{{ old('capaciteMax', $hebergement->capaciteMax) }}">
                                        </div>
                                        @error('capaciteMax')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="heureArrivee" class="font-medium">Heure de check-in :</label>
                                        <input name="heureArrivee" id="heureArrivee" type="time" class="form-input mt-2 @error('heureArrivee') border-red-500 @enderror" value="{{ old('heureArrivee', $hebergement->heureArrivee) }}">
                                        @error('heureArrivee')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-4 col-span-12">
                                        <label for="heureDepart" class="font-medium">Heure de check-out :</label>
                                        <input name="heureDepart" id="heureDepart" type="time" class="form-input mt-2 @error('heureDepart') border-red-500 @enderror" value="{{ old('heureDepart', $hebergement->heureDepart) }}">
                                        @error('heureDepart')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-12">
                                        <label class="font-semibold block mb-2">Équipements :</label>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            @foreach($equipements as $equipement)
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="equipements[]" id="equipement_{{ $equipement->idEquipement }}" value="{{ $equipement->idEquipement }}" class="form-checkbox @error('equipements') border-red-500 @enderror" {{ in_array($equipement->idEquipement, old('equipements', $hebergement->equipements->pluck('idEquipement')->toArray())) ? 'checked' : '' }}>
                                                    <label for="equipement_{{ $equipement->idEquipement }}" class="ms-2">{{ $equipement->nom }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('equipements')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-12">
                                        <label class="font-semibold block mb-2">Prix saisonniers (optionnel) :</label>
                                        <div id="prix-saisonniers-container">
                                            @php $prixSaisonniers = old('prixSaisonniers', $hebergement->prixSaisonniers ?? [[]]); @endphp

                                            @foreach($prixSaisonniers as $i => $saisonnier)
                                                <div class="grid grid-cols-12 gap-2 mb-2">
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-semibold block mb-2">Date de début :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][dateDebut]" type="date" class="form-input @error("prixSaisonniers.$i.dateDebut") border-red-500 @enderror" value="{{ old("prixSaisonniers.$i.dateDebut", $saisonnier['dateDebut'] ?? '') }}">
                                                        @error("prixSaisonniers.$i.dateDebut")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-semibold block mb-2">Date de fin :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][dateFin]" type="date" class="form-input @error("prixSaisonniers.$i.dateFin") border-red-500 @enderror" value="{{ old("prixSaisonniers.$i.dateFin", $saisonnier['dateFin'] ?? '') }}">
                                                        @error("prixSaisonniers.$i.dateFin")
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="md:col-span-4 col-span-12">
                                                        <label class="font-semibold block mb-2">Prix par nuit :</label>
                                                        <input name="prixSaisonniers[{{ $i }}][prixParNuit]" type="number" step="0.01" class="form-input @error("prixSaisonniers.$i.prixParNuit") border-red-500 @enderror" value="{{ old("prixSaisonniers.$i.prixParNuit", $saisonnier['prixParNuit'] ?? '') }}">
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

<script>

    const selectedFiles = [];
    const maxImages = 10;
    const maxSize = 10 * 1024 * 1024; // 10MB
    const previewBox = document.getElementById('preview-box');
    const newImagesPreview = document.getElementById('new-images-preview');
    const inputFile = document.getElementById('input-file');
    const errorContainer = document.getElementById('image-errors');

    function handleImageChange() {
        const newFiles = Array.from(inputFile.files);
        const currentCount = selectedFiles.length + document.querySelectorAll('.image-preview:not(.marked-deleted)').length;
        const errors = [];

        // Valider chaque fichier individuellement
        const validFiles = newFiles.filter(file => {
            if (selectedFiles.some(f => f.name === file.name && f.size === file.size)) {
                errors.push(`Le fichier "${file.name}" est déjà sélectionné.`);
                return false;
            }
            if (!['image/jpeg', 'image/png'].includes(file.type)) {
                errors.push(`Le fichier "${file.name}" doit être au format JPG ou PNG.`);
                return false;
            }
            if (file.size > maxSize) {
                errors.push(`Le fichier "${file.name}" dépasse la taille maximale de 10MB.`);
                return false;
            }
            return true;
        });

        // Vérifier la limite totale
        if (currentCount + validFiles.length > maxImages) {
            const allowedCount = maxImages - currentCount;
            if (allowedCount > 0) {
                validFiles.splice(allowedCount);
                errors.push(`Seules les ${allowedCount} premières images valides ont été ajoutées (limite de ${maxImages} images).`);
            } else {
                errors.push(`La limite de ${maxImages} images est atteinte.`);
                validFiles.length = 0;
            }
        }

        // Afficher les erreurs
        displayErrors(errors);

        // Ajouter les fichiers valides
        validFiles.forEach(file => {
            selectedFiles.push(file);
            addImageToPreview(file);
        });

        updateInputFiles();
        inputFile.value = '';
    }

    function addImageToPreview(file) {
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

        // Gestion de la suppression
        deleteBtn.addEventListener('click', () => {
            const index = parseInt(wrapper.dataset.index);
            selectedFiles.splice(index, 1);
            wrapper.remove();

            updatePreviewIndices();
            updatePrincipalBadge();
            updateInputFiles();
        });

        // Mettre à jour l'étiquette principale
        updatePrincipalBadge();
    }

    function updatePreviewIndices() {
        const wrappers = newImagesPreview.querySelectorAll('.image-preview');
        wrappers.forEach((wrapper, index) => {
            wrapper.dataset.index = index;
        });
    }

    function updatePrincipalBadge() {
        // Supprimer toutes les étiquettes existantes
        previewBox.querySelectorAll('.principal-badge').forEach(badge => badge.remove());

        // Trouver la première image non supprimée
        const firstWrapper = previewBox.querySelector('.image-preview:not(.marked-deleted)');
        if (firstWrapper) {
            const principalBadge = document.createElement('span');
            principalBadge.className = 'absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge';
            principalBadge.textContent = 'Principale';
            firstWrapper.appendChild(principalBadge);
        }
    }

    function updateInputFiles() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        inputFile.files = dataTransfer.files;
        console.log('Input files updated:', inputFile.files); // Débogage
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

    // Gérer la suppression des images existantes
    document.querySelectorAll('.mark-delete-image').forEach(button => {
        button.addEventListener('click', function () {
            const imageId = this.dataset.imageId;
            const preview = document.querySelector(`.image-preview[data-image-id="${imageId}"]`);
            const input = preview.querySelector('.image-keep-input');

            if (preview.classList.contains('marked-deleted')) {
                preview.classList.remove('marked-deleted', 'opacity-50');
                input.value = '1';
                button.textContent = '✕';
            } else {
                preview.classList.add('marked-deleted', 'opacity-50');
                input.value = '0';
                button.textContent = '↩';
            }
            updatePrincipalBadge();
        });
    });
    document.addEventListener('DOMContentLoaded', () => {
        inputFile.addEventListener('change', handleImageChange);
    });


    // Fonction pour ajouter dynamiquement des champs de prix saisonniers
    let prixSaisonnierIndex = 1; // On commence à 1 car le bloc 0 est déjà présent

    document.getElementById('add-prix-saison').addEventListener('click', function () {
        const container = document.getElementById('prix-saisonniers-container');

        // Créer un nouveau bloc HTML avec les bons noms
        const newBlock = document.createElement('div');
        newBlock.className = 'grid grid-cols-12 gap-2 mb-2';
        newBlock.innerHTML = `
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][dateDebut]" type="date" class="form-input" placeholder="Date de début">
                </div>
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][dateFin]" type="date" class="form-input" placeholder="Date de fin">
                </div>
                <div class="md:col-span-4 col-span-12">
                    <input name="prixSaisonniers[${prixSaisonnierIndex}][prixParNuit]" type="number" step="0.01" class="form-input" placeholder="Prix par nuit">
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

    // Nouvelle fonction pour mettre à jour le second dropdown dynamiquement via AJAX
    function updateTypePartenaireDropdown() {
        const familyType = document.getElementById('familyType').value;
        const typePartenaire = document.getElementById('typePartenaire');

        typePartenaire.innerHTML = '<option disabled selected>Chargement...</option>';
        typePartenaire.disabled = true;

        if (!familyType) {
            typePartenaire.innerHTML = '<option value="" disabled selected>-- Sélectionner un type --</option>';
            return;
        }

        fetch(`/partenaire/add/types-par-famille/${familyType}`)
            .then(response => response.json())
            .then(data => {
                typePartenaire.innerHTML = '<option value="" disabled selected>-- Sélectionner un type --</option>';
                data.forEach(type => {
                    const option = document.createElement('option');
                    option.value = type.idType;      // adapte selon ta clé primaire dans ta table
                    option.textContent = type.nomType;  // adapte selon le champ nom dans ta table
                    typePartenaire.appendChild(option);
                });
                typePartenaire.disabled = false;
            })
            .catch(error => {
                console.error('Erreur de chargement des types :', error);
                typePartenaire.innerHTML = '<option disabled selected>Erreur de chargement</option>';
            }
        );
    }

    // Écouteur pour le dropdown famille d'hébergement
    document.getElementById('familyType').addEventListener('change', updateTypePartenaireDropdown);

    // Appel initial pour gérer les anciennes valeurs au chargement
    document.addEventListener('DOMContentLoaded', () => {
        updateTypePartenaireDropdown();
    });
</script>

<!-- JAVASCRIPTS -->
@endsection
