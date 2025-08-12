@extends('layout.base') {{-- layout admin avec navbar + sidebar --}}
@section('title', 'Ajouter un partenaire')

@section('content')
<section class="min-h-screen flex items-center py-10 px-4 bg-no-repeat bg-center bg-cover relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>

    <div class="relative z-10 w-full max-w-2xl mx-auto bg-white dark:bg-slate-900 shadow-md rounded-lg px-8 py-16">
        <div class="text-center mb-6">
        </div>
        <h5 class="text-xl font-semibold mb-6 text-center text-slate-900 dark:text-white">Ajouter un compte partenaire</h5>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 dark:bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('partenaire.register.store') }}" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                @foreach ([
                    ['name' => 'nom_entreprise', 'label' => 'Nom Entreprise', 'type' => 'text', 'placeholder' => 'Ivoire Golf Hotel', 'required' => 'required'],
                    ['name' => 'email', 'label' => 'Adresse Email', 'type' => 'email', 'placeholder' => 'name@example.com', 'required' => 'required'],
                    ['name' => 'telephone', 'label' => 'Téléphone', 'type' => 'tel', 'placeholder' => '0000000000', 'required' => 'required'],
                    ['name' => 'adresse', 'label' => 'Adresse', 'type' => 'text', 'placeholder' => 'Abidjan, Marcory, Foyer des jeunes', 'required' => 'required'],
                    ['name' => 'siteWeb', 'label' => 'Site Web', 'type' => 'url', 'placeholder' => 'https://exemple.com'],
                    ['name' => 'mot_de_passe', 'label' => 'Mot de passe ( minimum 8 caractères)', 'type' => 'password', 'placeholder' => 'Votre mot de passe', 'required' => 'required'],
                    ['name' => 'mot_de_passe_confirmation', 'label' => 'Confirmer votre Mot de passe', 'type' => 'password', 'placeholder' => 'Votre mot de passe', 'required' => 'required'],
                ] as $field)
                    <div>
                        <label class="font-semibold block mb-2 text-slate-700 dark:text-white" for="{{ $field['name'] }}">{{ $field['label'] }} :</label>

                        @if (in_array($field['name'], ['mot_de_passe', 'mot_de_passe_confirmation']))
                            <div class="relative">
                                <input
                                    name="{{ $field['name'] }}"
                                    id="{{ $field['name'] }}"
                                    type="password"
                                    class="form-input w-full pr-10 @error($field['name']) border-red-500 @enderror"
                                    placeholder="{{ $field['placeholder'] }}"
                                    value="{{ old($field['name']) }}"
                                    {{ isset($field['required']) ? $field['required'] : '' }}
                                >
                                <button type="button" onclick="togglePassword('{{ $field['name'] }}')" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                                    <svg id="eyeVisible-{{ $field['name'] }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg id="eyeHidden-{{ $field['name'] }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.055 10.055 0 012.38-3.944M9.88 9.88a3 3 0 104.24 4.24M6.1 6.1l11.8 11.8"/>
                                    </svg>
                                </button>
                            </div>
                        @else
                            <input
                                name="{{ $field['name'] }}"
                                id="{{ $field['name'] }}"
                                type="{{ $field['type'] }}"
                                class="form-input w-full @error($field['name']) border-red-500 @enderror"
                                placeholder="{{ $field['placeholder'] }}"
                                value="{{ old($field['name']) }}"
                                {{ isset($field['required']) ? $field['required'] : '' }}
                            >
                        @endif

                        @error($field['name'])
                            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach

                <div>
                    <label for="type" class="font-semibold block mb-2 text-slate-700 dark:text-white">
                        Type d'entreprise :
                    </label>
                    <select
                        name="type"
                        id="type"
                        required
                        class="form-select w-full rounded-md p-2 border
                            border-gray-300 dark:border-gray-600
                            bg-white dark:bg-slate-800
                            text-gray-900 dark:text-white
                            placeholder-gray-400 dark:placeholder-gray-500
                            focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-green-600
                            @error('type') border-red-500 dark:border-red-400 @enderror"
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

                <div class="mb-4 ">
                    <label class="font-semibold block mb-2 text-slate-700 dark:text-white" for="photo_profil">Photo de profil :</label>
                    <input name="photo_profil" id="photo_profil" accept="image/jpeg,image/png,image/jpg" type="file" class="form-input mt-3">
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="AcceptT&C" class="form-checkbox text-green-600 mr-2" id="AcceptT&C">
                <label for="AcceptT&C" class="text-slate-600 dark:text-slate-300 text-sm">J'accepte les <a href="{{route('partenaire.terms')}}" class="text-green-600 dark:text-green-400">Termes et Conditions</a></label>
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md font-medium">Ajouter</button>
        </form>
    </div>
</section>
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
