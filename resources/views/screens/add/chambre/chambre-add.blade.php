@extends('layout.base')
@section('title', 'Ajouter une chambre')
@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                {{-- Titre de la page: S'adapte au mode sombre --}}
                <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Ajouter une chambre</h5>

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
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Ajouter un hébergement</li>
                </ul>
            </div>

            {{-- Messages de session: S'adaptent au mode sombre --}}
            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-4 py-2 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('partenaire.add.chambre.store') }}" method="POST" enctype="multipart/form-data" id="form-chambre">
                @csrf
                <div class="w-full md:w-3/4 mx-auto">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
                        {{-- Section Téléchargement d'images --}}
                        <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit mb-5">
                            <div>
                                <p class="font-medium mb-4 text-slate-900 dark:text-white">Téléchargez l'image de votre propriété ici (max 10 images, 10MB chacun)</p>

                                {{-- Zone de prévisualisation des images --}}
                                <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 dark:bg-slate-700 p-4 rounded-md shadow-inner text-center text-slate-400 dark:text-gray-300">
                                    Supports JPG et PNG. Taille max : 10MB.
                                </div>
                                <p class="font-medium mb-4 text-slate-900 dark:text-white"> <strong>NB:</strong>  La première image sera votre image principale. <br> Vous ne Pouvez Téléverser que 10 images.</p>

                                <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png,image/jpg,image/mp4" multiple class="hidden" onchange="handleImageChange()">
                                <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer">
                                    Ajouter des images
                                </label>
                                <div id="image-errors" class="text-red-600 text-sm mt-2"></div>
                                @error('images.*')
                                    <span class="text-red-600 text-sm block mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Section Détails de l'hébergement --}}
                        <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="numero">Numéro / Nom de la chambre <strong>*</strong>:</label>
                                    <input type="text" name="numero" id="numero" value="{{ old('numero') }}"
                                        class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('numero') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                    @error('numero')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="description">Description :</label>
                                    <textarea name="description" id="description" rows="3"
                                        class="form-textarea w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('description') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="prixParNuit">Prix par nuit <strong>*</strong>:</label>
                                    <input type="number" step="0.01" name="prixParNuit" id="prixParNuit" value="{{ old('prixParNuit') }}"
                                        class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('prixParNuit') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                    @error('prixParNuit')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="devise">Devise <strong>*</strong>:</label>
                                    <select name="devise" id="devise"
                                        class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('devise') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                        <option value="" disabled {{ old('devise') ? '' : 'selected' }}>-- Sélectionner une devise --</option>
                                        <option value="CFA" {{ old('devise') == 'CFA' ? 'selected' : '' }}>Franc CFA (CFA)</option>
                                        <option value="EUR" {{ old('devise') == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                        <option value="USD" {{ old('devise') == 'USD' ? 'selected' : '' }}>Dollar (USD)</option>
                                    </select>
                                    @error('devise')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="stock">Stock / Nombre disponible <strong>*</strong>:</label>
                                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                                        class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('stock') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                    @error('stock')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="nombreLits">Nombre de lit <strong>*</strong>:</label>
                                    <input type="number" name="nombreLits" id="nombreLits" value="{{ old('nombreLits') }}"
                                        class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('nombreLits') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                    @error('nombreLits')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="capaciteMax">Capacité maximale <strong>*</strong>:</label>
                                    <input type="number" name="capaciteMax" id="capaciteMax" value="{{ old('capaciteMax') }}"
                                        class="form-input w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('capaciteMax') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                    @error('capaciteMax')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="idTypeChambre">Type de chambre <strong>*</strong>:</label>
                                    <select name="idTypeChambre" id="idTypeChambre"
                                        class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('idTypeChambre') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                        <option value="" disabled {{ old('idTypeChambre') ? '' : 'selected' }}>-- Sélectionner un type --</option>
                                        @foreach($typesChambres as $type)
                                            <option value="{{ $type->id }}" {{ old('idTypeChambre') == $type->id ? 'selected' : '' }}>{{ $type->nomType }}</option>
                                        @endforeach
                                    </select>
                                    @error('idTypeChambre')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="md:col-span-4 col-span-12">
                                    <label for="ville" class="font-medium text-slate-900 dark:text-white">Ville <strong>*</strong>:</label>
                                    <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Ville" value="{{ old('ville') }}" required readonly>
                                    @error('ville')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-4 col-span-12">
                                    <label for="pays" class="font-medium text-slate-900 dark:text-white">Pays <strong>*</strong>:</label>
                                    <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Pays" value="{{ old('pays') }}" required readonly>
                                    @error('pays')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-4 col-span-12"> {{-- Corrected from Saying-md --}}
                                    <label for="adresse" class="font-medium text-slate-900 dark:text-white">Adresse <strong>*</strong>:</label>
                                    <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Adresse complète" value="{{ old('adresse') }}" required readonly>
                                    @error('adresse')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="md:col-span-4 col-span-12">
                                    <label for="latitude" class="font-medium text-slate-900 dark:text-white">Latitude <strong>*</strong>:</label>
                                    <input name="latitude" id="latitude" type="number" step="0.000001" class="form-input mt-2 @error('latitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Latitude" value="{{ old('latitude') }}" required readonly>
                                    @error('latitude')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-4 col-span-12">
                                    <label for="longitude" class="font-medium text-slate-900 dark:text-white">Longitude <strong>*</strong>:</label>
                                    <input name="longitude" id="longitude" type="number" step="0.000001" class="form-input mt-2 @error('longitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Longitude" value="{{ old('longitude', '') }}" required readonly>
                                    @error('longitude')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="md:col-span-4 col-span-12 flex justify-center items-center">
                                    <button type="button" onclick="openMapPopup()" class="btn bg-green-600 text-white rounded-md px-4 py-2 hover:bg-green-700">
                                        Ajouter ma localisation
                                    </button>
                                </div>

                                <div class="md:col-span-6 col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white" for="idPolitiqueAnnulation">Politique d'annulation :</label>
                                    <select name="idPolitiqueAnnulation" id="idPolitiqueAnnulation"
                                        class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2
                                        @error('idPolitiqueAnnulation') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        <option value="" disabled {{ old('idPolitiqueAnnulation') ? '' : 'selected' }}>-- Sélectionner une politique --</option>
                                        @foreach($politiquesAnnulation as $politique)
                                            <option value="{{ $politique->id }}" {{ old('idPolitiqueAnnulation') == $politique->id ? 'selected' : '' }}>{{ $politique->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('idPolitiqueAnnulation')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Statut --}}
                                <div class="col-span-6">
                                    <label for="statut" class="font-medium text-slate-900 dark:text-white">Statut :</label>
                                    <select id="statut"
                                            class="form-select mt-2 w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('statut') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        <option value="active" selected>Active</option>
                                        <option value="annulee">Annulée</option>
                                        <option value="brouillon">Brouillon</option>
                                    </select>
                                    @error('statut') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-12">
                                   <p class="font-medium mb-4 text-slate-900 dark:text-white"> <strong>NB:</strong>  Tous les champs avec <strong>(*)</strong> sont obligatoires.</p>
                                </div>
                                <div class="md:col-span-4 col-span-12">
                                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full">Ajouter l'hébergement</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('form-chambre');
            const inputFile = document.getElementById('input-file');
            const previewBox = document.getElementById('preview-box');
            const errorContainer = document.getElementById('image-errors');

            const maxImages = 10;
            const maxSize = 10 * 1024 * 1024;
            let selectedFiles = [];

            inputFile.addEventListener('change', handleImageChange);
            form.addEventListener('submit', function (e) {
                injectFilesToForm();
            });

            function handleImageChange(e) {
                const files = Array.from(e.target.files);
                const errors = [];
                const validFiles = [];

                if (selectedFiles.length + files.length > maxImages) {
                    errors.push(`Vous ne pouvez pas ajouter plus de ${maxImages} images.`);
                }

                for (let file of files) {
                    if (!['image/jpeg', 'image/png', 'image/jpg', 'image/mp4'].includes(file.type)) {
                        errors.push(`"${file.name}" n'est pas une image valide (JPG/PNG/MP4).`);
                        continue;
                    }

                    if (file.size > maxSize) {
                        errors.push(`"${file.name}" dépasse 10MB.`);
                        continue;
                    }

                    if (selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
                        errors.push(`"${file.name}" est déjà sélectionné.`);
                        continue;
                    }

                    validFiles.push(file);
                }

                if (errors.length > 0) {
                    displayErrors(errors);
                }

                validFiles.forEach((file, index) => {
                    selectedFiles.push(file);
                    addPreview(file, selectedFiles.length - 1);
                });
            }

            function addPreview(file, index) {
                if (selectedFiles.length === 1 && previewBox.innerHTML.includes('Supports JPG et PNG')) {
                    previewBox.innerHTML = '';
                }

                const wrapper = document.createElement('div');
                wrapper.className = 'relative rounded border border-gray-300 dark:border-gray-600 p-1 bg-white dark:bg-slate-700 shadow max-w-[150px] image-preview';
                wrapper.dataset.index = index;

                const img = document.createElement('img');
                img.className = 'w-full h-auto object-cover rounded';
                img.src = URL.createObjectURL(file);
                img.onload = () => URL.revokeObjectURL(img.src);

                const deleteBtn = document.createElement('button');
                deleteBtn.innerHTML = '✕';
                deleteBtn.className = 'absolute top-1 left-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600';
                deleteBtn.type = 'button';
                deleteBtn.addEventListener('click', () => {
                    selectedFiles.splice(index, 1);
                    wrapper.remove();
                    refreshPreviews();
                });

                wrapper.appendChild(deleteBtn);
                wrapper.appendChild(img);

                if (index === 0) {
                    const badge = document.createElement('span');
                    badge.className = 'absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge';
                    badge.textContent = 'Principale';
                    wrapper.appendChild(badge);
                }

                previewBox.appendChild(wrapper);
            }

            function refreshPreviews() {
                previewBox.innerHTML = '';
                selectedFiles.forEach((file, i) => {
                    addPreview(file, i);
                });

                if (selectedFiles.length === 0) {
                    previewBox.innerHTML = '<p class="text-slate-400 dark:text-gray-300">Supports JPG et PNG. Taille max : 10MB.</p>';
                }
            }

            function displayErrors(errors) {
                errorContainer.innerHTML = '';
                errors.forEach(msg => {
                    const li = document.createElement('div');
                    li.textContent = msg;
                    errorContainer.appendChild(li);
                });
            }

            function injectFilesToForm() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                inputFile.files = dataTransfer.files;
            }
        });


        function updateTypePartenaireDropdown() {
            const familyType = document.getElementById('familyType').value;
            const typePartenaire = document.getElementById('typePartenaire');

            typePartenaire.innerHTML = '<option disabled selected>Chargement...</option>';
            typePartenaire.disabled = true;

            if (!familyType) {
                typePartenaire.innerHTML = '<option value="" disabled selected>-- Sélectionner un type --</option>';
                typePartenaire.disabled = false; // Enable if no selection is available
                return;
            }

            fetch(`/partenaire/add/types-par-famille/${familyType}`)
                .then(response => response.json())
                .then(data => {
                    typePartenaire.innerHTML = '<option value="" disabled selected>-- Sélectionner un type --</option>';
                    data.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type.id;      // adapte selon ta clé primaire dans ta table
                        option.textContent = type.nomType;  // adapte selon le champ nom dans ta table
                        typePartenaire.appendChild(option);
                    });
                    typePartenaire.disabled = false;
                })
                .catch(error => {
                    console.error('Erreur de chargement des types :', error);
                    typePartenaire.innerHTML = '<option disabled selected>Erreur de chargement</option>';
                    typePartenaire.disabled = false; // Re-enable on error
                });
        }

        // Fonction pour ajouter dynamiquement des champs de prix saisonniers
        let prixSaisonnierIndex = 1; // On commence à 1 car le bloc 0 est déjà présent

        document.getElementById('add-prix-saison').addEventListener('click', function () {
            const container = document.getElementById('prix-saisonniers-container');

            // Créer un nouveau bloc HTML avec les bons noms
            const newBlock = document.createElement('div');
            newBlock.className = 'grid grid-cols-12 gap-2 mb-2';
            newBlock.innerHTML = `
                    <div class="md:col-span-4 col-span-12">
                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Date de début :</label>
                        <input name="prixSaisonniers[${prixSaisonnierIndex}][dateDebut]" type="date" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Date de début">
                    </div>
                    <div class="md:col-span-4 col-span-12">
                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Date de fin:</label>
                        <input type="date" name="prixSaisonniers[${prixSaisonnierIndex}][dateFin]" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Date de fin">
                    </div>
                    <div class="md:col-span-4 col-span-12">
                        <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Prix par nuit :</label>
                        <input type="number" step="0.01" name="prixSaisonniers[${prixSaisonnierIndex}][prixParNuit]" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="Prix par nuit">
                    </div>
                    <div class="col-span-12"> {{-- Changed to col-span-12 for better mobile layout, adjust if needed --}}
                        <button type="button" class="remove-block btn bg-white dark:bg-slate-700 text-red-600 border border-red-300 dark:border-red-600 hover:bg-red-50 dark:hover:bg-red-800 rounded-md px-2 py-1 w-full mt-2">
                            Retirer cette période
                        </button>
                    </div>
            `;

            container.appendChild(newBlock);
            prixSaisonnierIndex++;
        });

        // Gestion du clic sur les boutons "✕" pour les prix saisonniers
        document.getElementById('prix-saisonniers-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-block')) {
                const row = e.target.closest('.grid');
                if (row) row.remove();
            }
        });

        // Écouteur pour le dropdown famille d'hébergement
        document.getElementById('familyType').addEventListener('change', updateTypePartenaireDropdown);

        // Appel initial pour gérer les anciennes valeurs au chargement et peupler le type d'hébergement
        document.addEventListener('DOMContentLoaded', () => {
            updateTypePartenaireDropdown();
            // If old('idType') exists, try to pre-select it after types are loaded
            const oldTypeId = "{{ old('idType') }}";
            if (oldTypeId) {
                // A small delay to ensure options are loaded by updateTypePartenaireDropdown
                setTimeout(() => {
                    const typePartenaire = document.getElementById('typePartenaire');
                    if (typePartenaire) {
                        typePartenaire.value = oldTypeId;
                    }
                }, 100);
            }
        });

        let telephoneIndex = 1;

        document.getElementById('add-telephone').addEventListener('click', function () {
            const container = document.getElementById('telephones-container');
            const newBlock = document.createElement('div');
            newBlock.className = 'grid grid-cols-12 gap-2 mb-2 telephone-item'; // Added telephone-item class
            newBlock.innerHTML = `
                <div class="md:col-span-4 col-span-10"> {{-- Adjusted for button --}}
                    <input name="telephones[${telephoneIndex}][numero]" type="text" class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="+2250700000000">
                </div>
                <div class="md:col-span-2 col-span-2"> {{-- Small column for remove button --}}
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


        function openMapPopup() {
            const width = 600;
            const height = 500;
            const left = (screen.width / 2) - (width / 2);
            const top = (screen.height / 2) - (height / 2);

            const mapWindow = window.open(
                "/partenaire/localisation-popup-chambre", // à créer dans Laravel
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
@endsection
