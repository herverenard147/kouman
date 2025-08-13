@extends('layout.base')
@section('title', 'Ajouter une excursion')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Ajouter une nouvelle excursion</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    {{-- Lien de fil d'Ariane normal: S'adapte au mode sombre --}}
                    <li class="inline-block capitalize text-[16px] font-medium text-slate-900 dark:text-white duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                        <a href="{{route('partenaire.dashboard')}}">Afrique évasion</a>
                    </li>
                    {{-- Séparateur de fil d'Ariane: S'adapte au mode sombre --}}
                    <li class="inline-block text-base text-slate-950 dark:text-gray-400 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="mdi mdi-chevron-right"></i>
                    </li>
                    {{-- Élément actif du fil d'Ariane: La couleur verte est déjà bien contrastée --}}
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Ajouter une Excursion</li>
                </ul>
            </div>

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

            <form action="{{ route('partenaire.add.excursion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full md:w-3/4 mx-auto">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
                        <!-- Section Images -->
                        <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit mb-5">
                            <div>
                                <p class="font-medium text-slate-900 dark:text-white mb-4 text-slate-900 dark:text-white">Téléchargez l'image de votre propriété ici (max 10 images, 10MB chacun)</p>

                                {{-- Zone de prévisualisation des images --}}
                                <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 dark:bg-slate-700 p-4 rounded-md shadow-inner text-center text-slate-400 dark:text-gray-300">
                                    Supports JPG et PNG. Taille max : 10MB.
                                </div>
                                <p class="font-medium text-slate-900 dark:text-white mb-4 text-slate-900 dark:text-white"> <strong>NB:</strong>  La première image sera votre image principale. <br> Vous ne Pouvez Téléverser que 10 images.</p>

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
                        <!-- Autres champs -->
                        <div class="rounded-md shadow p-6 bg-white dark:bg-slate-800 h-fit mb-5">
                            <div class="grid grid-cols-12 gap-5">

                                <!-- Titre -->
                                <div class="col-span-12">
                                    <label for="titre" class="font-medium text-slate-900 dark:text-white">Titre de l'excursion :</label>
                                    <input name="titre" id="titre" type="text" class="form-input mt-2 @error('titre') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" placeholder="Titre de l'excursion" value="{{ old('titre') }}" required>
                                    @error('titre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Nom du guide -->
                                <div class="col-span-6">
                                    <label for="nom_guide" class="font-medium text-slate-900 dark:text-white">Nom du guide :</label>
                                    <input name="nom_guide" id="nom_guide" type="text" class="form-input mt-2 @error('nom_guide') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('nom_guide') }}" placeholder="Nom complet du guide">
                                    @error('nom_guide') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Langues parlées -->
                                <div class="col-span-6">
                                    <label for="langues" class="font-semibold text-slate-900 dark:text-white mb-2 inline-block">Langues parlées :</label>

                                    <select id="langues"
                                    name="langues[]"
                                    multiple
                                            class="form-select w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('langues') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        <option value="">-- Choisir une/plusieurs langue(s) --</option>
                                        @foreach($langues as $langue)
                                            <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Input caché qui sera envoyé au backend -->
                                    <input type="hidden" name="langues" id="langues_input">

                                    <!-- Affichage dynamique des langues choisies -->
                                    <div id="langues_list" class="mt-4 flex flex-wrap gap-3"></div>
                                </div>

                                <!-- Récurrence -->
                                <div class="col-span-6">
                                    <label for="recurrence" class="font-medium text-slate-900 dark:text-white">Fréquence :</label>
                                    <select name="recurrence" id="recurrence" class="form-select mt-2 w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('recurrence') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        @foreach(['ponctuelle', 'quotidienne', 'hebdomadaire', 'mensuelle'] as $freq)
                                            <option value="{{ $freq }}" {{ old('recurrence') == $freq ? 'selected' : '' }}>
                                                {{ ucfirst($freq) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('recurrence') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Âge minimum -->
                                <div class="col-span-6">
                                    <label for="age_minimum" class="font-medium text-slate-900 dark:text-white">Âge minimum requis :</label>
                                    <input name="age_minimum" id="age_minimum" type="number" min="10" class="form-input mt-2 @error('age_minimum') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('age_minimum', 10) }}">
                                    @error('age_minimum') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Conditions d’annulation -->
                                <div class="col-span-6">
                                    <label for="idPolitiqueAnnulation" class="font-medium text-slate-900 dark:text-white">Politique d'annulation:</label>
                                    <select name="idPolitiqueAnnulation" id="idPolitiqueAnnulation" class="form-select mt-2 w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('idPolitiqueAnnulation') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        <option value="" selected>Aucune</option>
                                        @foreach($politiques as $politique)
                                            <option value="{{ $politique->id }}" {{ old('idPolitiqueAnnulation') == $politique->id ? 'selected' : '' }}>{{ $politique->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('idPolitiqueAnnulation')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Moyens de paiement -->
                                <div class="col-span-6">
                                    <label for="moyens_paiement" class="font-medium text-slate-900 dark:text-white">Moyens de paiement acceptés :</label>
                                    <select id="moyens_paiement"
                                            class="form-select mt-2 w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('moyens_paiement') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">
                                        <option value="" selected>Aucune</option>
                                        @foreach($moyensPaiements as $moyensPaiement)
                                            <option value="{{ $moyensPaiement->id }}" {{ old('moyens_paiement') == $moyensPaiement->id ? 'selected' : '' }}>{{ $moyensPaiement->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('moyens_paiement') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-span-12">
                                    <label for="description" class="font-medium text-slate-900 dark:text-white">Description :</label>
                                    <textarea name="description" id="description" class="form-input mt-2 @error('description') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white">{{ old('description') }}</textarea>
                                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Date / Heure -->
                                <div class="col-span-6">
                                    <label for="date" class="font-medium text-slate-900 dark:text-white">Date de l'excursion :</label>
                                    <input name="date" id="date" type="date" class="form-input mt-2 @error('date') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('date') }}">
                                    @error('date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="heure_debut" class="font-medium text-slate-900 dark:text-white">Heure de début :</label>
                                    <input name="heure_debut" id="heure_debut" type="time" class="form-input mt-2 @error('heure_debut') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('heure_debut') }}">
                                    @error('heure_debut') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Durée -->
                                <div class="col-span-6">
                                    <label for="duree" class="font-medium text-slate-900 dark:text-white">Durée (en heures) :</label>
                                    <input name="duree" id="duree" type="number" step="0.1" min="0.5" max="24" class="form-input mt-2 @error('duree') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('duree') }}" required>
                                    @error('duree') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Prix / Devise -->
                                <div class="col-span-6">
                                    <label for="prix" class="font-medium text-slate-900 dark:text-white">Prix par personne :</label>
                                    <input name="prix" id="prix" type="number" step="0.01" min="0" class="form-input mt-2 @error('prix') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('prix') }}" required>
                                    @error('prix') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="devise" class="font-medium text-slate-900 dark:text-white">Devise :</label>
                                    <select name="devise" id="devise" class="form-select mt-2 w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 @error('devise') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                        @foreach(['CFA', 'EUR', 'USD', 'GBP', 'CAD', 'AUD'] as $dev)
                                            <option value="{{ $dev }}" {{ old('devise') == $dev ? 'selected' : '' }}>{{ $dev }}</option>
                                        @endforeach
                                    </select>
                                    @error('devise') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Capacité -->
                                <div class="col-span-6">
                                    <label for="capacite_max" class="font-medium text-slate-900 dark:text-white">Capacité maximale :</label>
                                    <input name="capacite_max" id="capacite_max" type="number" min="1" class="form-input mt-2 @error('capacite_max') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('capacite_max', 1) }}" required>
                                    @error('capacite_max') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Localisation -->

                                <div class="col-span-6">
                                    <label for="depart_adresse" class="font-medium text-slate-900 dark:text-white">Adresse (point de départ) :</label>
                                    <input name="depart_adresse" id="depart_adresse" type="text" class="form-input mt-2 @error('depart_adresse') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('depart_adresse') }}" required readonly>
                                    @error('depart_adresse') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="arrive_adresse" class="font-medium text-slate-900 dark:text-white">Adresse (point d'arrivée) :</label>
                                    <input name="arrive_adresse" id="arrive_adresse" type="text" class="form-input mt-2 @error('arrive_adresse') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('arrive_adresse') }}" required readonly>
                                    @error('arrive_adresse') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Bouton de depart -->
                                <div class="col-span-6">
                                    <button type="button" onclick="openMapPopup('depart')" class="btn bg-green-600 text-white rounded-md px-4 py-2 mt-2">
                                        Ajouter le point de départ
                                    </button>
                                </div>

                                <!-- Bouton d'arrivée -->
                                <div class="col-span-6">
                                    <button type="button" onclick="openMapPopup('arrive')" class="btn bg-green-600 text-white rounded-md px-4 py-2 mt-2">
                                        Ajouter le point d'arrivée
                                    </button>
                                </div>

                                <!-- Équipements -->

                                <div class="col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Équipements :</label>
                                    <div id="equipements-container">
                                        <div class="grid grid-cols-12 gap-2 mb-2">
                                            <div class="col-span-4">
                                                <input name="equipements[0][nom]" type="text"
                                                    class="form-input @error('equipements.0.nom') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600"
                                                    placeholder="Ex: Climatisation"
                                                    value="{{ old('equipements.0.nom') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="add-equipement"
                                        class="btn bg-white text-gray-800 border border-gray-300 hover:bg-gray-100 rounded-md mt-2">
                                        Ajouter un équipement
                                    </button>
                                </div>

                                <!-- Téléphones -->
                                <div class="col-span-12">
                                    <label class="font-semibold block mb-2 text-slate-900 dark:text-white">Numéros de téléphone :</label>
                                    <div id="telephones-container">
                                        <div class="grid grid-cols-12 gap-2 mb-2">
                                            <div class="col-span-4">
                                                <input name="telephones[0][numero]" type="text" class="form-input  @error('telephones.0.numero') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600" placeholder="+2250700000000" value="{{ old('telephones.0.numero') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="add-telephone" class="btn bg-white text-gray-800 border border-gray-300 hover:bg-gray-100 rounded-md mt-2">
                                        Ajouter un numéro
                                    </button>
                                </div>

                                {{-- 🎯 NOUVEAUX CHAMPS ICI --}}
                                {{-- @include('client.partials.excursion_extras') --}}

                                <!-- Boutons -->
                                <div class="col-span-12 flex justify-end space-x-4 mt-6">
                                    <a href="{{ route('partenaire.dashboard') }}" class="btn bg-red-500 hover:bg-red-600 text-white rounded-md px-4 py-2">Annuler</a>
                                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md px-4 py-2">Ajouter l'excursion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-span-6"><label for="ville" class="font-medium text-slate-900 dark:text-white">Ville :</label> --}}
                                    <input name="depart_ville" id="depart_ville" type="text" class="hidden form-input mt-2 @error('depart_ville') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white"  value="{{ old('depart_ville') }}" readonly>
                                    {{-- @error('ville') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-6"><label for="pays" class="font-medium text-slate-900 dark:text-white">Pays :</label> --}}
                                    <input name="depart_pays" id="depart_pays" type="text" class=" hidden form-input mt-2 @error('depart_pays') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('depart_pays') }}" readonly>
                                    {{-- @error('pays') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-3"> --}}
                                    {{-- <label for="latitude" class="font-medium text-slate-900 dark:text-white">Latitude :</label> --}}
                                    <input name="depart_latitude" id="depart_latitude" type="number" step="0.000001" class="hidden form-input mt-2 @error('depart_latitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('depart_latitude') }}" readonly>
                                    {{-- @error('latitude') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-3"> --}}
                                    {{-- <label for="longitude" class="font-medium text-slate-900 dark:text-white">Longitude :</label> --}}
                                    <input name="depart_longitude" id="depart_longitude" type="number" step="0.000001" class="hidden form-input mt-2 @error('depart_longitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('depart_longitude') }}" readonly>
                                    {{-- @error('longitude') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-6"><label for="ville" class="font-medium text-slate-900 dark:text-white">Ville :</label> --}}
                                    <input name="arrive_ville" id="arrive_ville" type="text" class="hidden form-input mt-2 @error('arrive_ville') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white"  value="{{ old('arrive_ville') }}" readonly>
                                    {{-- @error('ville') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-6"><label for="pays" class="font-medium text-slate-900 dark:text-white">Pays :</label> --}}
                                    <input name="arrive_pays" id="arrive_pays" type="text" class=" hidden form-input mt-2 @error('arrive_pays') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('arrive_pays') }}" readonly>
                                    {{-- @error('pays') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-3"> --}}
                                    {{-- <label for="latitude" class="font-medium text-slate-900 dark:text-white">Latitude :</label> --}}
                                    <input name="arrive_latitude" id="arrive_latitude" type="number" step="0.000001" class="hidden form-input mt-2 @error('arrive_latitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('arrive_latitude') }}" readonly>
                                    {{-- @error('latitude') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}

                                {{-- <div class="col-span-3"> --}}
                                    {{-- <label for="longitude" class="font-medium text-slate-900 dark:text-white">Longitude :</label> --}}
                                    <input name="arrive_longitude" id="arrive_longitude" type="number" step="0.000001" class="hidden form-input mt-2 @error('arrive_longitude') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('arrive_longitude') }}" readonly>
                                    {{-- @error('longitude') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror --}}
                                {{-- </div> --}}
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>

    // LANGUES
    const selectLangues = document.getElementById("langues");
    const hiddenInput = document.getElementById("langues_input");
    const listContainer = document.getElementById("langues_list");


        let languesSelectionnees = [];
    selectLangues.addEventListener("change", function () {
        const selectedId = this.value;
        const selectedText = this.options[this.selectedIndex].text;

        if (selectedId && !languesSelectionnees.includes(selectedId)) {
            languesSelectionnees.push(selectedId);

            // Mettre à jour l'input caché avec les IDs séparés par des virgules
            hiddenInput.value = languesSelectionnees.join(",");

            // Créer un élément visuel pour la langue
            const langDiv = document.createElement("div");
            langDiv.classList.add("px-3", "py-1", "bg-blue-100", "text-blue-800", "rounded", "flex", "items-center", "gap-2");
            langDiv.innerHTML = `${selectedText} <span class="cursor-pointer text-red-500">&times;</span>`;

            // Gérer la suppression d'une langue
            langDiv.querySelector("span").addEventListener("click", function () {
                languesSelectionnees = languesSelectionnees.filter(id => id !== selectedId);
                hiddenInput.value = languesSelectionnees.join(",");
                langDiv.remove();
            });

            listContainer.appendChild(langDiv);
        }

        // Réinitialiser la sélection
        this.value = "";
    });


    const selectedFiles = [];
    const maxImages = 10;
    const maxSize = 10 * 1024 * 1024; // 10MB
    const previewBox = document.getElementById('preview-box');
    const inputFile = document.getElementById('input-file');
    const errorContainer = document.getElementById('image-errors');

    function handleImageChange() {
        const newFiles = Array.from(inputFile.files);
        const currentCount = selectedFiles.length;
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
        if (selectedFiles.length === 1 && previewBox.children.length === 0) {
            previewBox.innerHTML = '';
        }

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

        if (selectedFiles.length === 1 && previewBox.children.length === 0) {
            const principalBadge = document.createElement('span');
            principalBadge.className = 'absolute bottom-0 left-0 bg-green-600 text-white text-xs px-2 py-1 rounded principal-badge';
            principalBadge.textContent = 'Principale';
            wrapper.appendChild(principalBadge);
        }

        wrapper.appendChild(deleteBtn);
        wrapper.appendChild(img);
        previewBox.appendChild(wrapper);

        deleteBtn.addEventListener('click', () => {
            const index = parseInt(wrapper.dataset.index);
            selectedFiles.splice(index, 1);
            wrapper.remove();

            updatePreviewIndices();
            updatePrincipalBadge();

            if (selectedFiles.length === 0 && previewBox.children.length === 0) {
                previewBox.innerHTML = 'Supports JPG et PNG. Taille max : 10MB.';
            }

            updateInputFiles();
        });

        updatePrincipalBadge();
    }

    function updatePreviewIndices() {
        const wrappers = previewBox.querySelectorAll('.image-preview');
        wrappers.forEach((wrapper, index) => {
            wrapper.dataset.index = index;
        });
    }

    function updatePrincipalBadge() {
        previewBox.querySelectorAll('.principal-badge').forEach(badge => badge.remove());
        const firstWrapper = previewBox.querySelector('.image-preview');
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
        console.log('Input files updated:', inputFile.files);
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

    let equipementIndex = 1;

    document.getElementById('add-equipement').addEventListener('click', function () {
        const container = document.getElementById('equipements-container');

        const newBlock = document.createElement('div');
        newBlock.className = 'grid grid-cols-12 gap-2 mb-2';
        newBlock.innerHTML = `
            <div class="col-span-4">
                <input name="equipements[${equipementIndex}][nom]" type="text"
                    class="form-input bg-white dark:bg-slate-700 text-slate-900 dark:text-white border-gray-300 dark:border-gray-600"
                    placeholder="Ex: Climatisation">
            </div>
            <div class="col-span-2">
                <button type="button" class="remove-block btn text-red-600 border border-red-300 hover:bg-red-50 rounded-md px-2 py-1 w-full">
                    Retirer
                </button>
            </div>
        `;
        container.appendChild(newBlock);
        equipementIndex++;
    });


    // Suppression dynamique
    document.getElementById('equipements-container').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-block')) {
            e.target.closest('.grid').remove();
        }
    });


    // Validation côté client
    document.querySelector('form').addEventListener('submit', function (e) {
        const errors = [];
        const today = new Date().toISOString().split('T')[0];
        const dateExcursion = document.getElementById('date').value;
        const heureDebut = document.getElementById('heure_debut').value;
        const duree = parseFloat(document.getElementById('duree').value);
        const capaciteMax = parseInt(document.getElementById('capacite_max').value);

        if (dateExcursion && dateExcursion < today) {
            errors.push("La date de l'excursion doit être aujourd'hui ou postérieure.");
        }

        if (heureDebut && dateExcursion === today) {
            const now = new Date();
            const currentTime = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
            if (heureDebut < currentTime) {
                errors.push("L'heure de début doit être postérieure à l'heure actuelle pour une excursion aujourd'hui.");
            }
        }

        if (duree > 24) {
            errors.push("La durée ne peut pas dépasser 24 heures.");
        }

        if (capaciteMax < 1) {
            errors.push("La capacité maximale doit être d'au moins 1 personne.");
        }

        if (errors.length > 0) {
            e.preventDefault();
            const errorDiv = document.createElement('div');
            errorDiv.className = 'text-red-600 text-sm mb-4';
            const ul = document.createElement('ul');
            ul.className = 'list-disc pl-5';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                ul.appendChild(li);
            });
            errorDiv.appendChild(ul);
            const form = e.target;
            if (!form.querySelector('.form-errors')) {
                const errorContainer = document.createElement('div');
                errorContainer.className = 'form-errors';
                form.prepend(errorContainer);
            }
            form.querySelector('.form-errors').innerHTML = '';
            form.querySelector('.form-errors').appendChild(errorDiv);
        }
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

    function openMapPopup(prefix) {
        const width = 600;
        const height = 500;
        const left = (screen.width / 2) - (width / 2);
        const top = (screen.height / 2) - (height / 2);

        const mapWindow = window.open(
            "/partenaire/localisation-popup", // à créer dans Laravel
            "Localisation",
            `width=${width},height=${height},top=${top},left=${left}`
        );
        // window.addEventListener('message', function (event) {
        //     if (event.origin !== window.location.origin) return;

        //     const { latitude, longitude, adresse, ville, pays } = event.data;

        //     console.log(" Données reçues :", event.data); // 👀 ici tu verras tout

        //     // Assure-toi que latitude/longitude sont bien définies
        //     if (latitude !== undefined && longitude !== undefined) {
        //         document.getElementById('latitude').value = latitude;
        //         document.getElementById('longitude').value = longitude;
        //     }

        //     if (adresse) document.getElementById('adresse').value = adresse;
        //     if (ville) document.getElementById('ville').value = ville;
        //     if (pays) document.getElementById('pays').value = pays;
        // });
        window.addEventListener('message', function (event) {
            if (event.origin !== window.location.origin) return;

            const { latitude, longitude, adresse, ville, pays } = event.data;

            console.log("Données reçues :", event.data);

            if (latitude !== undefined && longitude !== undefined) {
                document.getElementById(prefix + '_latitude').value = latitude;
                document.getElementById(prefix + '_longitude').value = longitude;
            }

            if (adresse) document.getElementById(prefix + '_adresse').value = adresse;
            if (ville) document.getElementById(prefix + '_ville').value = ville;
            if (pays) document.getElementById(prefix + '_pays').value = pays;
         }, { once: true });
    }
    </script>
@endpush
@endsection
