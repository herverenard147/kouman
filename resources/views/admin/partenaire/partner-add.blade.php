@extends('layout.base')
@section('title', 'Ajouter un partenaire')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen pt-16 pb-12">
    <div class="container mx-auto px-4 max-w-3xl py-16">

        {{-- En-tête avec titre + fil d'Ariane --}}
        <div class="md:flex justify-between items-center mb-8">
            <h5 class="text-lg font-semibold text-slate-900 dark:text-white">
                Ajouter un partenaire
            </h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[16px] font-medium duration-500 text-slate-700 dark:text-gray-300 hover:text-green-600">
                    <a href="{{ route('admin.dashboard') }}">Afrique évasion</a>
                </li>
                <li class="inline-block text-base mx-0.5 ltr:rotate-0 rtl:rotate-180 text-gray-500 dark:text-gray-400">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Ajouter un partenaire</li>
            </ul>
        </div>

        {{-- Messages de succès / erreurs --}}
        @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-400 px-4 py-2 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-400 px-4 py-2 rounded mb-6">
            <ul class="list-disc pl-6 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Formulaire --}}
        <form method="POST" enctype="multipart/form-data" action="{{ route('partenaire.register.store') }}" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                @foreach ([
                    ['name' => 'nom_entreprise', 'label' => 'Nom Entreprise', 'type' => 'text', 'placeholder' => 'Ivoire Golf Hotel', 'required' => 'required'],
                    ['name' => 'email', 'label' => 'Adresse Email', 'type' => 'email', 'placeholder' => 'name@example.com', 'required' => 'required'],
                    ['name' => 'telephone', 'label' => 'Téléphone', 'type' => 'tel', 'placeholder' => '0000000000', 'required' => 'required'],
                    ['name' => 'adresse', 'label' => 'Adresse', 'type' => 'text', 'placeholder' => 'Abidjan, Marcory, Foyer des jeunes', 'required' => 'required'],
                    ['name' => 'siteWeb', 'label' => 'Site Web', 'type' => 'url', 'placeholder' => 'https://exemple.com'],
                    ['name' => 'mot_de_passe', 'label' => 'Mot de passe (minimum 8 caractères)', 'type' => 'password', 'placeholder' => 'Votre mot de passe', 'required' => 'required'],
                    ['name' => 'mot_de_passe_confirmation', 'label' => 'Confirmer votre Mot de passe', 'type' => 'password', 'placeholder' => 'Votre mot de passe', 'required' => 'required'],
                ] as $field)
                <div>
                    <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $field['label'] }} <span class="{{ isset($field['required']) ? 'text-red-500' : '' }}"></span></label>

                    @if(in_array($field['name'], ['mot_de_passe', 'mot_de_passe_confirmation']))
                    <div class="relative">
                        <input
                            name="{{ $field['name'] }}"
                            id="{{ $field['name'] }}"
                            type="password"
                            placeholder="{{ $field['placeholder'] }}"
                            value="{{ old($field['name']) }}"
                            {{ isset($field['required']) ? 'required' : '' }}
                            class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-600 @error($field['name']) border-red-500 @enderror"
                        >
                        <button type="button" onclick="togglePassword('{{ $field['name'] }}')" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                            <svg id="eyeVisible-{{ $field['name'] }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeHidden-{{ $field['name'] }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.055 10.055 0 012.38-3.944M9.88 9.88a3 3 0 104.24 4.24M6.1 6.1l11.8 11.8" />
                            </svg>
                        </button>
                    </div>
                    @else
                    <input
                        name="{{ $field['name'] }}"
                        id="{{ $field['name'] }}"
                        type="{{ $field['type'] }}"
                        placeholder="{{ $field['placeholder'] }}"
                        value="{{ old($field['name']) }}"
                        {{ isset($field['required']) ? 'required' : '' }}
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-600 @error($field['name']) border-red-500 @enderror"
                    >
                    @endif

                    @error($field['name'])
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                @endforeach

                <div>
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Type d'entreprise <span class="text-red-500">*</span></label>
                    <select
                        name="type"
                        id="type"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-slate-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-600 @error('type') border-red-500 dark:border-red-400 @enderror"
                    >
                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>-- Sélectionner un type --</option>
                        <option value="hotel" {{ old('type') == 'hotel' ? 'selected' : '' }}>Hôtel</option>
                        <option value="residence" {{ old('type') == 'residence' ? 'selected' : '' }}>Résidence</option>
                        <option value="agence_voyage" {{ old('type') == 'agence_voyage' ? 'selected' : '' }}>Agence de voyage</option>
                        <option value="compagnie_aerienne" {{ old('type') == 'compagnie_aerienne' ? 'selected' : '' }}>Compagnie aérienne</option>
                    </select>
                    @error('type')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="photo_profil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Photo de profil</label>
                    <input name="photo_profil" id="photo_profil" accept="image/jpeg,image/png,image/jpg" type="file" class="w-full text-gray-700 dark:text-gray-300">
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="AcceptT&C" id="AcceptT&C" class="form-checkbox text-green-600 mr-2" required>
                <label for="AcceptT&C" class="text-slate-600 dark:text-slate-300 text-sm">
                    J'accepte les <a href="{{ route('partenaire.terms') }}" class="text-green-600 dark:text-green-400 hover:underline">Termes et Conditions</a>
                </label>
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md font-medium">
                Ajouter
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        const eyeVisible = document.getElementById('eyeVisible-' + id);
        const eyeHidden = document.getElementById('eyeHidden-' + id);

        if (input.type === 'password') {
            input.type = 'text';
            eyeVisible.classList.add('hidden');
            eyeHidden.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeVisible.classList.remove('hidden');
            eyeHidden.classList.add('hidden');
        }
    }
</script>
@endpush
