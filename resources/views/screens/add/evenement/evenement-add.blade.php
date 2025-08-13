@extends('layout.base')
@section('title', 'Ajouter un événement')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
                <div class="md:flex justify-between items-center">
                    <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Ajouter un nouveau evenement</h5>

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
                        <li class="inline-block capitalize text-[16px] font-medium  text-green-600" aria-current="page">Ajouter un Evènement</li>
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
                <form action="{{ route('partenaire.add.event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Section Images -->

                <div class="w-full md:w-3/4 mx-auto">
                    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
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
                                    <label for="titre" class="font-medium text-slate-900 dark:text-white">Titre de l'événement :</label>
                                    <input name="titre" id="titre" type="text" class="form-input mt-2 @error('titre') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" placeholder="Titre de l'événement" value="{{ old('titre') }}" required>
                                    @error('titre')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Description -->
                                <div class="col-span-12">
                                    <label for="description" class="font-medium text-slate-900 dark:text-white">Description :</label>
                                    <textarea name="description" id="description" class="form-input mt-2 @error('description') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" placeholder="Description de l'événement">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Date -->
                                <div class="col-span-6">
                                    <label for="date" class="font-medium text-slate-900 dark:text-white">Date de l'événement :</label>
                                    <input name="date" id="date" type="date" class="form-input mt-2 @error('date') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('date') }}" required>
                                    @error('date')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Heure de début -->
                                <div class="col-span-6">
                                    <label for="heure_debut" class="font-medium text-slate-900 dark:text-white">Heure de début :</label>
                                    <input name="heure_debut" id="heure_debut" type="time" class="form-input mt-2 @error('heure_debut') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('heure_debut') }}">
                                    @error('heure_debut')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Durée -->
                                <div class="col-span-6">
                                    <label for="duree" class="font-medium text-slate-900 dark:text-white">Durée (en heures) :</label>
                                    <input name="duree" id="duree" type="number" step="0.1" min="0.5" max="24" class="form-input mt-2 @error('duree') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('duree') }}">
                                    @error('duree')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Prix -->
                                <div class="col-span-6">
                                    <label for="prix" class="font-medium text-slate-900 dark:text-white">Prix par personne :</label>
                                    <input name="prix" id="prix" type="number" step="0.01" min="0" class="form-input mt-2 @error('prix') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('prix') }}" required>
                                    @error('prix')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Devise -->
                                <div class="col-span-6">
                                    <label for="devise" class="font-medium text-slate-900 dark:text-white">Devise :</label>
                                    <select name="devise" id="devise" class="form-input mt-2 @error('devise') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" required>
                                        <option value="CFA" {{ old('devise') == 'CFA' ? 'selected' : '' }}>CFA</option>
                                        <option value="EUR" {{ old('devise') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        <option value="USD" {{ old('devise') == 'USD' ? 'selected' : '' }}>USD</option>
                                    </select>
                                    @error('devise')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Capacité maximale -->
                                <div class="col-span-6">
                                    <label for="capacite_max" class="font-medium text-slate-900 dark:text-white">Capacité maximale :</label>
                                    <input name="capacite_max" id="capacite_max" type="number" min="1" class="form-input mt-2 @error('capacite_max') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('capacite_max', 1) }}" required>
                                    @error('capacite_max')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Localisation -->
                                <div class="col-span-6">
                                    <label for="ville" class="font-medium text-slate-900 dark:text-white">Ville :</label>
                                    <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('ville') }}" disabled>
                                    @error('ville')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-6">
                                    <label for="pays" class="font-medium text-slate-900 dark:text-white">Pays :</label>
                                    <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('pays') }}" disabled>
                                    @error('pays')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <label for="adresse" class="font-medium text-slate-900 dark:text-white">Adresse :</label>
                                    <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white" value="{{ old('adresse') }}" disabled>
                                    @error('adresse')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Boutons -->
                                <div class="col-span-12 flex justify-end space-x-4">
                                    {{-- <div class="p-1 w-1/2"> --}}
                                        {{-- <form action="{{route('partenaire.hebergement.destroy', ['id' => $hebergement->idHebergement])}}" method="post">
                                        @csrf
                                        @method('DELETE') --}}
                                            {{-- <button type="submit" id="open-delete-modal" class="btn bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2">Supprimer</button> --}}
                                        {{-- </form> --}}

                                    {{-- </div> --}}
                                    <div>

                                        <button type="submit" id="open-delete-modal" class="btn bg-red-500 hover:bg-red-600 text-white rounded-md px-4 py-2"  type="submit" id="open-delete-modal">Annuler</button>
                                    </div>

                                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md px-4 py-2">Ajouter l'événement</button>
                                </div>
                                        <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                                            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                                                <h3 class="text-lg font-semibold mb-4">Voulez-vous vraiment annuler cette action ?</h3>
                                                <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir annuler l'enregistrement de cet évènement ? Cette action est irréversible.</p>
                                                {{-- <form action="{{ route('partenaire.dashboard') }}"> --}}
                                                    <div class="flex justify-end space-x-4">
                                                        <a href="{{ route('partenaire.dashboard') }}" class="btn bg-red-600 hover:bg-red-700 text-white rounded-md px-4 py-2">Annuler</a>
                                                        <button type="button" id="close-delete-modal" class="btn bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2">Fermer</button>
                                                    </div>
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
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

        displayErrors(errors);

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

    document.querySelector('form').addEventListener('submit', function (e) {
        const errors = [];
        const today = new Date().toISOString().split('T')[0];
        const dateEvenement = document.getElementById('date').value;
        const heureDebut = document.getElementById('heure_debut').value;
        const duree = parseFloat(document.getElementById('duree').value) || 0;
        const capaciteMax = parseInt(document.getElementById('capacite_max').value);

        if (!dateEvenement) {
            errors.push("La date de l'événement est requise.");
        } else if (dateEvenement < today) {
            errors.push("La date de l'événement doit être aujourd'hui ou postérieure.");
        }

        if (heureDebut && dateEvenement === today) {
            const now = new Date();
            const currentTime = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
            if (heureDebut < currentTime) {
                errors.push("L'heure de début doit être postérieure à l'heure actuelle pour un événement aujourd'hui.");
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
    </script>
@endpush
@endsection
