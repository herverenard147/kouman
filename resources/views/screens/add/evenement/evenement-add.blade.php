@extends('layout.base')
@section('title', 'Ajouter un événement')

@section('content')
<div class="container relative">
    <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
        <h5 class="text-lg font-semibold mb-6">Ajouter un nouvel événement</h5>
        <form action="{{ route('partenaire.add.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Section Images -->
            <div class="rounded-md shadow p-6 bg-white h-fit mb-5">
                <div>
                    <p class="font-medium mb-4">Téléchargez les images de votre événement (max 10 images, 10MB chacune, JPG/PNG)</p>
                    <div id="preview-box" class="preview-box flex flex-wrap gap-4 overflow-x-auto max-h-60 bg-gray-50 p-4 rounded-md shadow-inner text-center text-slate-400">
                        Supports JPG et PNG. Taille max : 10MB.
                    </div>
                    <input type="file" id="input-file" name="images[]" accept="image/jpeg,image/png" multiple class="hidden" onchange="handleImageChange()">
                    <label for="input-file" class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer inline-block">
                        Ajouter des images
                    </label>
                    <div id="image-errors" class="text-red-600 text-sm mt-2"></div>
                    @error('images.*')
                        <span class="text-red-600 text-sm block mt-2">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Autres champs -->
            <div class="rounded-md shadow p-6 bg-white h-fit mb-5">
                <div class="grid grid-cols-12 gap-5">
                    <!-- Titre -->
                    <div class="col-span-12">
                        <label for="titre" class="font-medium">Titre de l'événement :</label>
                        <input name="titre" id="titre" type="text" class="form-input mt-2 @error('titre') border-red-500 @enderror" placeholder="Titre de l'événement" value="{{ old('titre') }}" required>
                        @error('titre')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div class="col-span-12">
                        <label for="description" class="font-medium">Description :</label>
                        <textarea name="description" id="description" class="form-input mt-2 @error('description') border-red-500 @enderror" placeholder="Description de l'événement">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Date -->
                    <div class="col-span-6">
                        <label for="date" class="font-medium">Date de l'événement :</label>
                        <input name="date" id="date" type="date" class="form-input mt-2 @error('date') border-red-500 @enderror" value="{{ old('date') }}" required>
                        @error('date')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Heure de début -->
                    <div class="col-span-6">
                        <label for="heure_debut" class="font-medium">Heure de début :</label>
                        <input name="heure_debut" id="heure_debut" type="time" class="form-input mt-2 @error('heure_debut') border-red-500 @enderror" value="{{ old('heure_debut') }}">
                        @error('heure_debut')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Durée -->
                    <div class="col-span-6">
                        <label for="duree" class="font-medium">Durée (en heures) :</label>
                        <input name="duree" id="duree" type="number" step="0.1" min="0.5" max="24" class="form-input mt-2 @error('duree') border-red-500 @enderror" value="{{ old('duree') }}">
                        @error('duree')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Prix -->
                    <div class="col-span-6">
                        <label for="prix" class="font-medium">Prix par personne :</label>
                        <input name="prix" id="prix" type="number" step="0.01" min="0" class="form-input mt-2 @error('prix') border-red-500 @enderror" value="{{ old('prix') }}" required>
                        @error('prix')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Devise -->
                    <div class="col-span-6">
                        <label for="devise" class="font-medium">Devise :</label>
                        <select name="devise" id="devise" class="form-input mt-2 @error('devise') border-red-500 @enderror" required>
                            <option value="CFA" {{ old('devise') == 'CFA' ? 'selected' : '' }}>CFA</option>
                            <option value="EUR" {{ old('devise') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="USD" {{ old('devise') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="GBP" {{ old('devise') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            <option value="CAD" {{ old('devise') == 'CAD' ? 'selected' : '' }}>CAD</option>
                            <option value="AUD" {{ old('devise') == 'AUD' ? 'selected' : '' }}>AUD</option>
                        </select>
                        @error('devise')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Capacité maximale -->
                    <div class="col-span-6">
                        <label for="capacite_max" class="font-medium">Capacité maximale :</label>
                        <input name="capacite_max" id="capacite_max" type="number" min="1" class="form-input mt-2 @error('capacite_max') border-red-500 @enderror" value="{{ old('capacite_max', 1) }}" required>
                        @error('capacite_max')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Localisation -->
                    <div class="col-span-6">
                        <label for="ville" class="font-medium">Ville :</label>
                        <input name="ville" id="ville" type="text" class="form-input mt-2 @error('ville') border-red-500 @enderror" value="{{ old('ville') }}" disabled>
                        @error('ville')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="pays" class="font-medium">Pays :</label>
                        <input name="pays" id="pays" type="text" class="form-input mt-2 @error('pays') border-red-500 @enderror" value="{{ old('pays') }}" disabled>
                        @error('pays')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-12">
                        <label for="adresse" class="font-medium">Adresse :</label>
                        <input name="adresse" id="adresse" type="text" class="form-input mt-2 @error('adresse') border-red-500 @enderror" value="{{ old('adresse') }}" disabled>
                        @error('adresse')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Équipements -->
                    <div class="col-span-12">
                        <label class="font-medium">Équipements inclus :</label>
                        <div class="mt-2">
                            @foreach(\App\Models\Equipement::whereIn('type', ['evenement', 'inclus', 'optionnel'])->orWhereNull('type')->get() as $equipement)
                                <label class="inline-flex items-center mr-4">
                                    <input type="checkbox" name="equipements[]" value="{{ $equipement->idEquipement }}" class="form-checkbox" {{ in_array($equipement->idEquipement, old('equipements', [])) ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $equipement->nom }} {{ $equipement->type ? "({$equipement->type})" : '' }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('equipements')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Boutons -->
                    <div class="col-span-12 flex justify-end space-x-4">
                        <a href="{{ route('partenaire.dashboard') }}" class="btn bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2">Annuler</a>
                        <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md px-4 py-2">Ajouter l'événement</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
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
