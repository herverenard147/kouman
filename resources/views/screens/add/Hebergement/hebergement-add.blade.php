@extends('layout.base')
@section('title', 'Ajouter un hebergement')
@section('content')

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->

            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Ajouter un hebergement</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600"><a href="{{route('partenaire.dashboard')}}">Kouman</a></li>
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
            <form action="{{ route('partenaire.add.hebergement.store') }}" method="POST" enctype="multipart/form-data" id="form-hebergement">
                @csrf
                <div class="container relative">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
                        <div class="rounded-md shadow p-6 bg-white h-fit mb-5">
                            <div>
                                <p class="font-medium mb-4">Téléchargez l'image de votre propriété ici (max 10 images, 10MB chacun)</p>

                                <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 p-4 rounded-md shadow-inner text-center text-slate-400">
                                    Supports JPG et PNG. Taille max : 10MB.
                                </div>
                                <p class="font-medium mb-4"> <strong>NB:</strong>  La première image sera votre image principale. <br> Vous ne Pouvez Téléverser que 10 images.</p>

                                <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png" multiple class="hidden" onchange="handleImageChange()">
                                <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer">
                                    Ajouter des images
                                </label>
                                <div id="image-errors" class="text-red-600 text-sm mt-2"></div>
                                @error('images.*')
                                    <span class="text-red-600 text-sm block mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="rounded-md shadow p-6 bg-white h-fit">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12">
                                <label for="nom" class="font-medium">Nom <strong>*</strong>:</label>
                                <input name="nom" id="nom" type="text" class="form-input mt-2 @error('nom') border-red-500 @enderror" placeholder="Nom de l'hébergement" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-6 col-span-12">
                                <label class="font-semibold block mb-2" for="familyType">Famille d'hébergement <strong>*</strong>:</label>
                                <select name="familyType" id="familyType" class="form-select w-full border border-gray-300 rounded-md p-2 @error('familyType') border-red-500 @enderror" required>
                                    <option value="" disabled {{ old('familyType') ? '' : 'selected' }}>-- Sélectionner une famille --</option>
                                    @foreach($familles as $famille)
                                        <option value="{{ $famille->id }}" {{ old('familyType') == $famille->id ? 'selected' : '' }}>{{ $famille->nomFamille }}</option>
                                    @endforeach
                                </select>
                                @error('familyType')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-6 col-span-12">
                                <label class="font-semibold block mb-2" for="idType">Type d'hébergement <strong>*</strong>:</label>
                                <select name="idType" id="typePartenaire" class="form-select w-full border border-gray-300 rounded-md p-2 @error('idType') border-red-500 @enderror" required>
                                    <option value="" disabled {{ old('idType') ? '' : 'selected' }}>-- Sélectionner un type --</option>
                                </select>
                                @error('idType')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label for="description" class="font-medium">Description <strong>*</strong>:</label>
                                <textarea name="description" id="description" rows="5" class="form-input mt-2 @error('description') border-red-500 @enderror" placeholder="Décrivez votre hébergement..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="prixParNuit" class="font-medium">Prix par nuit <strong>*</strong>:</label>
                                <div class="form-icon relative mt-2">
                                    <i class="bi bi-currency-dollar absolute top-2 start-4 text-green-600"></i>
                                    <input name="prixParNuit" id="prixParNuit" type="number" step="0.01" class="form-input ps-11 @error('prixParNuit') border-red-500 @enderror" placeholder="0.00" value="{{ old('prixParNuit') }}" required>
                                </div>
                                @error('prixParNuit')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="devise" class="font-medium">Devise <strong>*</strong>:</label>
                                <select name="devise" id="devise" class="form-select w-full border border-gray-300 rounded-md p-2 @error('devise') border-red-500 @enderror" required>
                                    <option value="CFA" {{ old('devise') == 'CFA' ? 'selected' : '' }}>CFA (CFA)</option>
                                    <option value="EUR" {{ old('devise') == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                                    <option value="USD" {{ old('devise') == 'USD' ? 'selected' : '' }}>USD ($)</option>
                                    <option value="GBP" {{ old('devise') == 'GBP' ? 'selected' : '' }}>GBP (£)</option>
                                    <option value="CAD" {{ old('devise') == 'CAD' ? 'selected' : '' }}>CAD (C$)</option>
                                    <option value="AUD" {{ old('devise') == 'AUD' ? 'selected' : '' }}>AUD (A$)</option>
                                </select>
                                @error('devise')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="idPolitiqueAnnulation" class="font-medium">Politique d'annulation:</label>
                                <select name="idPolitiqueAnnulation" id="politiqueAnnulation" class="form-select w-full border border-gray-300 rounded-md p-2 @error('idPolitiqueAnnulation') border-red-500 @enderror" >
                                    <option value="" selected>Aucune</option>
                                    @foreach($politiques as $politique)
                                        <option value="{{ $politique->id }}" {{ old('idPolitiqueAnnulation') == $politique->id ? 'selected' : '' }}>{{ $politique->nom }}</option>
                                    @endforeach
                                </select>
                                @error('idPolitiqueAnnulation')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-6 col-span-12">
                                <label for="ville" class="font-medium">Ville <strong>*</strong>:</label>
                                <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror" placeholder="Ville" value="{{ old('ville') }}" required>
                                @error('ville')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-6 col-span-12">
                                <label for="pays" class="font-medium">Pays <strong>*</strong>:</label>
                                <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror" placeholder="Pays" value="{{ old('pays') }}" required>
                                @error('pays')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div Saying-md class="col-span-4 col-span-12">
                                <label for="adresse" class="font-medium">Adresse <strong>*</strong>:</label>
                                <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror" placeholder="Adresse complète" value="{{ old('adresse') }}" required>
                                @error('adresse')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="codePostal" class="font-medium">Code postal <strong>*</strong>:</label>
                                <input name="codePostal" id="codePostal" type="text" class="form-input mt-2 @error('codePostal') border-red-500 @enderror" placeholder="Code postal" value="{{ old('codePostal') }}" required>
                                @error('codePostal')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="md:col-span-4 col-span-12">
                                <button type="button" onclick="openMapPopup()" class="btn bg-green-600 text-white rounded-md px-4 py-2">
                                    Ajouter ma localisation
                                </button>
                            </div>
                            <div class="md:col-span-4 col-span-12">
                                <label for="latitude" class="font-medium">Latitude <strong>*</strong>:</label>
                                <input name="latitude" id="latitude" type="number" step="0.000001" class="form-input mt-2 @error('latitude') border-red-500 @enderror" placeholder="Latitude" value="{{ old('latitude') }}" required>
                                @error('latitude')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="longitude" class="font-medium">Longitude <strong>*</strong>:</label>
                                <input name="longitude" id="longitude" type="number" step="0.000001" class="form-input mt-2 @error('longitude') border-red-500 @enderror" placeholder="Longitude" value="{{ old('longitude') }}" required>
                                @error('longitude')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="nombreSallesDeBain" class="font-medium">Nombre de salles de bain <strong>*</strong>:</label>
                                <input name="nombreSallesDeBain" id="nombreSallesDeBain" type="number" class="form-input mt-2 @error('nombreSallesDeBain') border-red-500 @enderror" placeholder="0" value="{{ old('nombreSallesDeBain') }}" required>
                                @error('nombreSallesDeBain')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="nombreChambres" class="font-medium">Nombre de chambres <strong>*</strong>:</label>
                                <div class="form-icon relative mt-2">
                                    <i class="bi bi-door-open absolute top-3 start-4 text-green-600"></i>
                                    <input name="nombreChambres" id="nombreChambres" type="number" class="form-input ps-11 @error('nombreChambres') border-red-500 @enderror" placeholder="0" value="{{ old('nombreChambres') }}" required>
                                </div>
                                @error('nombreChambres')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="capaciteMax" class="font-medium">Capacité maximum <strong>*</strong>:</label>
                                <div class="form-icon relative mt-2">
                                    <i class="bi bi-person absolute top-3 start-4 text-green-600"></i>
                                    <input name="capaciteMax" id="capaciteMax" type="number" class="form-input ps-11 @error('capaciteMax') border-red-500 @enderror" placeholder="1" value="{{ old('capaciteMax') }}" required>
                                </div>
                                @error('capaciteMax')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="heureArrivee" class="font-medium">Heure de check-in :</label>
                                <input name="heureArrivee" id="heureArrivee" type="time" class="form-input mt-2 @error('heureArrivee') border-red-500 @enderror" value="{{ old('heureArrivee') }}">
                                @error('heureArrivee')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="md:col-span-4 col-span-12">
                                <label for="heureDepart" class="font-medium">Heure de check-out :</label>
                                <input name="heureDepart" id="heureDepart" type="time" class="form-input mt-2 @error('heureDepart') border-red-500 @enderror" value="{{ old('heureDepart') }}">
                                @error('heureDepart')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label class="font-semibold block mb-2">Équipements :</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach($equipements as $equipement)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="equipements[]" id="equipement_{{ $equipement->id }}" value="{{ $equipement->id }}" class="form-checkbox @error('equipements') border-red-500 @enderror" {{ in_array($equipement->id, old('equipements', [])) ? 'checked' : '' }}>
                                            <label for="equipement_{{ $equipement->id }}" class="ms-2">{{ $equipement->nom }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('equipements')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <label class="font-semibold block mb-2">Numéros de téléphone :</label>
                                <div id="telephones-container">
                                    <div class="grid grid-cols-12 gap-2 mb-2">
                                        <div class="md:col-span-4 col-span-4">
                                            <input name="telephones[0][numero]" type="text" class="form-input @error('telephones.0.numero') border-red-500 @enderror" placeholder="+2250700000000" value="{{ old('telephones.0.numero') }}">
                                            @error('telephones.0.numero')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @error('telephones.*.numero')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                                <button type="button" id="add-telephone" class="btn bg-white text-gray-800 border border-gray-300 hover:bg-gray-100 rounded-md mt-2">
                                    Ajouter un numéro
                                </button>
                            </div>


                            <div class="col-span-12">
                                <label class="font-semibold block mb-2">Prix saisonniers (optionnel) :</label>
                                <div id="prix-saisonniers-container">
                                    <div class="grid grid-cols-12 gap-2 mb-2">
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="font-semibold block mb-2">Date de début :</label>
                                            <input name="prixSaisonniers[0][dateDebut]" type="date" class="form-input @error('prixSaisonniers.0.dateDebut') border-red-500 @enderror" placeholder="Date de début" value="{{ old('prixSaisonniers.0.dateDebut') }}">
                                            @error('prixSaisonniers.0.dateDebut')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="font-semibold block mb-2">Date de fin:</label>
                                            <input type="date" name="prixSaisonniers[0][dateFin]" class="form-input @error('prixSaisonniers.0.dateFin') border-red-500 @enderror" placeholder="Date de fin" value="{{ old('prixSaisonniers.0.dateFin') }}">
                                            @error('prixSaisonniers.0.dateFin')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="font-semibold block mb-2">Prix par nuit :</label>
                                            <input type="number" step="0.01" name="prixSaisonniers[0][prixParNuit]" class="form-input @error('prixSaisonniers.0.prixParNuit') border-red-500 @enderror" placeholder="Prix par nuit" value="{{ old('prixSaisonniers.0.prixParNuit') }}">
                                            @error('prixSaisonniers.0.prixParNuit')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-prix-saison" class="btn bg-white text-gray-800 border border-gray-300 hover:bg-gray-100 rounded-md mt-2">
                                    Ajouter une période
                                </button>
                            </div>
                            <div class="col-span-12">
                               <p class="font-medium mb-4"> <strong>NB:</strong>  Tous les champs avec <strong>(*)</strong> sont obligatoires.</p>
                            </div>
                            <div class="md:col-span-4 col-span-12">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md w-full">Ajouter l'hébergement</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div><!--end container-->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form-hebergement');
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
                if (!['image/jpeg', 'image/png'].includes(file.type)) {
                    errors.push(`"${file.name}" n'est pas une image valide (JPG/PNG).`);
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
            if (selectedFiles.length === 1) previewBox.innerHTML = '';

            const wrapper = document.createElement('div');
            wrapper.className = 'relative rounded border border-gray-300 p-1 bg-white shadow max-w-[150px] image-preview';
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
                previewBox.innerHTML = 'Supports JPG et PNG. Taille max : 10MB.';
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
            });
    }
    // console.log("cc",updateInputFiles());

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

    // Écouteur pour le dropdown famille d'hébergement
    document.getElementById('familyType').addEventListener('change', updateTypePartenaireDropdown);

    // Appel initial pour gérer les anciennes valeurs au chargement
    document.addEventListener('DOMContentLoaded', () => {
        updateTypePartenaireDropdown();
    });

    let telephoneIndex = 1;

    document.getElementById('add-telephone').addEventListener('click', function () {
        const container = document.getElementById('telephones-container');

        const newBlock = document.createElement('div');
        newBlock.className = 'grid grid-cols-12 gap-2 mb-2';
        newBlock.innerHTML = `
            <div class="md:col-span-4 col-span-12">
                <input name="telephones[${telephoneIndex}][numero]" type="text" class="form-input" placeholder="+2250700000000">
            </div>
            <div class="md:col-span-3 col-span-4">
                <button type="button" class="remove-block btn text-red-600 border border-red-300 hover:bg-red-50 rounded-md px-2 py-1 w-full">
                    Retirer
                </button>
            </div>
        `;

        container.appendChild(newBlock);
        telephoneIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-block')) {
            e.target.closest('.grid').remove();
        }
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

    // Recevoir la position depuis la popup
     window.addEventListener('message', function (event) {
        if (event.origin !== window.location.origin) return;

        const { latitude, longitude, adresse, ville, pays } = event.data;
        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
        document.getElementById('adresse').value = adresse;
        document.getElementById('ville').value = ville;
        document.getElementById('pays').value = pays;
    }, false);
}
</script>

<!-- JAVASCRIPTS -->
@endsection
