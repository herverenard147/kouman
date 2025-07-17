
@extends('content.no-sidebar')
@section('title', 'Signup')
@section('content')
    {{-- <section class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 grid-cols-1">
                <div class="relative overflow-hidden bg-white shadow-md rounded-md">
                    <div class="p-6">
                        <a href="">
                            <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto block" alt="">
                            <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto hidden" alt="">
                        </a>
                        <h5 class="my-6 text-xl font-semibold">Créez votre compte</h5>
                        <form method="POST" action="{{ route('register') }}" class="text-start" >
                            <div class="grid grid-cols-1">
                                {{-- <div class="mb-4">
                                    <label class="font-semibold" for="RegisterName">Nom Entreprise:</label>
                                    <input id="nom_entreprise" type="text" class="form-input mt-3" placeholder="Harry">
                                </div>

                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Addresse Email:</label>
                                    <input id="email" type="email" class="form-input mt-3" placeholder="name@example.com">
                                </div> --}}

                                {{-- <div class="flex space-x-4">
                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="nom_entreprise">Nom Entreprise:</label>
                                        <input id="nom_entreprise" type="text" class="form-input mt-3 w-full" placeholder="Harry">
                                    </div>

                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="email">Adresse Email:</label>
                                        <input id="email" type="email" class="form-input mt-3 w-full" placeholder="name@example.com">
                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="type">Type d'entreprise:</label>
                                        <select id="type" class="form-select mt-3 w-full border border-gray-300 rounded-md p-2">
                                            <option value="" disabled selected>-- Sélectionner un type --</option>
                                            <option value="hotel">HOTEL</option>
                                            <option value="agence_voyage">AGENCE DE VOYAGE</option>
                                            <option value="comp_aer">COMPAGNIE AERIENNE</option>
                                            <option value="residence">RESIDENCE</option>
                                            <option value="autre">AUTRES</option>
                                        </select>
                                    </div>

                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="téléphone">Téléphone:</label>
                                        <input id="téléphone" type="tel" class="form-input mt-3 w-full" placeholder="0000000000">
                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="adresse">Adresse:</label>
                                        <input id="adresse" type="text" class="form-input mt-3 w-full" placeholder="Abidjan, Marcory, Foyer des jeunes">
                                    </div>

                                    <div class="mb-4 w-1/2">
                                        <label class="font-semibold" for="siteWeb">Site Web:</label>
                                        <input id="siteWeb" type="email" class="form-input mt-3 w-full" placeholder="name@example.com">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginPassword">Mot de passe:</label>
                                    <input id="LoginPassword" type="password" class="form-input mt-3" placeholder="**********">
                                </div>

                                <div class="mb-4">
                                    <div class="flex items-center mb-0">
                                        <input class="form-checkbox rounded border-gray-200 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="AcceptT&C">
                                        <label class="form-check-label text-slate-400" for="AcceptT&C">J'accepte les <a href="" class="text-green-600">Termes et Conditions</a></label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <a href="" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">S'Inscrire</a>
                                </div>

                                <div class="text-center">
                                    <span class="text-slate-400 me-2">Avez-vous déjà un compte ? </span> <a href="{{route('login')}}" class="text-black font-medium">Se Connecter</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="px-6 py-2 bg-slate-50 text-center">
                        <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Designed by <a href="https://kwlegaltech.com//" target="_blank" class="text-reset">kw legal tech</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!--end section -->

    <section class="min-h-screen flex items-center py-10 px-4 bg-[url('{{ asset('images/01.jpg') }}')] bg-no-repeat bg-center bg-cover relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>

        <div class="relative z-10 w-full max-w-2xl">
            <div class="bg-white shadow-md rounded-lg px-8 py-10">
                <div class="text-center mb-6">
                    <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto w-32 h-auto" alt="Logo">
                </div>

                <h5 class="text-xl font-semibold mb-6 text-center">Créez votre compte</h5>

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

                <form method="POST" action="{{ route('partenaire.register.store') }}"  class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-semibold block mb-2" for="nom_entreprise">Nom Entreprise :</label>
                            <input name="nom_entreprise" id="nom_entreprise" type="text" class="form-input w-full @error('nom_entreprise') border-red-500 @enderror" placeholder="Ivoire Golf Hotel" value="{{ old('nom_entreprise') }}" required>
                            @error('nom_entreprise')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="email">Adresse Email :</label>
                            <input name="email" id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="type">Type d'entreprise :</label>
                            <select name="type" id="type" class="form-select w-full border border-gray-300 rounded-md p-2 @error('type') border-red-500 @enderror" required>
                                <option value="" disabled {{ old('type') ? '' : 'selected' }}>-- Sélectionner un type --</option>
                                <option value="hotel" {{ old('type') == 'hotel' ? 'selected' : '' }}>Hôtel</option>
                                <option value="residence" {{ old('type') == 'residence' ? 'selected' : '' }}>Résidence</option>
                                <option value="agence_voyage" {{ old('type') == 'agence_voyage' ? 'selected' : '' }}>Agence de voyage</option>
                                <option value="compagnie_aerienne" {{ old('type') == 'compagnie_aerienne' ? 'selected' : '' }}>Compagnie aérienne</option></select>
                            @error('type')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="téléphone">Téléphone :</label>
                            <input name="téléphone" id="téléphone" type="tel" class="form-input w-full @error('téléphone') border-red-500 @enderror" placeholder="0000000000" value="{{ old('téléphone') }}" required>
                            @error('téléphone')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="adresse">Adresse :</label>
                            <input name="adresse" id="adresse" type="text" class="form-input w-full @error('adresse') border-red-500 @enderror" placeholder="Abidjan, Marcory, Foyer des jeunes" value="{{ old('adresse') }}" required>
                            @error('adresse')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="siteWeb">Site Web :</label>
                            <input name="siteWeb" id="siteWeb" type="url" class="form-input w-full @error('siteWeb') border-red-500 @enderror" placeholder="https://exemple.com" value="{{ old('siteWeb') }}">
                            @error('siteWeb')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="mot_de_passe">Mot de passe :</label>
                            <input name="mot_de_passe" id="mot_de_passe" type="password" class="form-input w-full @error('mot_de_passe') border-red-500 @enderror" placeholder="Votre mot de passe" required>
                            @error('mot_de_passe')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="font-semibold block mb-2" for="mot_de_passe_confirmation">Confirmer votre Mot de passe :</label>
                            <input name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" type="password" class="form-input w-full @error('mot_de_passe_confirmation') border-red-500 @enderror" placeholder="Votre mot de passe" required>
                            @error('mot_de_passe_confirmation')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="flex items-center">
                        <input type="checkbox" name="AcceptT&C" class="form-checkbox text-green-600 mr-2" id="AcceptT&C">
                        <label for="AcceptT&C" class="text-slate-600 text-sm">J'accepte les <a href="{{route('partenaire.terms')}}" class="text-green-600">Termes et Conditions</a></label>
                    </div>

                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md font-medium">S'Inscrire</button>

                    <p class="text-center text-sm text-slate-500 mt-4">
                        Avez-vous déjà un compte ?
                        <a href="{{ route('partenaire.login') }}" class="text-black font-medium">Se Connecter</a>
                    </p>
                </form>
                <div class="px-6 py-2 bg-slate-50 text-center">
                    <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Kw Legal & Tech. Designed by <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">KW Legal & Tech</a>.</p>
                </div>
            </div>
        </div>
    </section>


@endsection

