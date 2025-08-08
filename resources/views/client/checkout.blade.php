@php
$page = 'light';
$fpage = 'foot1';
@endphp

@extends('client.base.style.base')
@section('title', 'Finalisation de commande')

@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 text-center mt-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                <span class="block bg-clip-text text-transparent bg-white">Finalisez votre commande</span>
            </h1>
        </div>
    </div>
</section>
<div class="relative">
    <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->
<div class="min-h-screen bg-white dark:bg-slate-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- En-tête avec étapes de commande -->
        <div class="text-center mb-16">
            <div class="mt-8 flex justify-center px-4">
                <div class="flex items-center bg-white rounded-full px-6 py-2 shadow-sm">
                    <!-- Étape Panier -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-2 text-sm font-medium text-gray-700">Panier</div>
                    </div>

                    <!-- Flèche -->
                    <div class="mx-2 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <!-- Étape Livraison (active) -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-600 flex items-center justify-center">
                            <span class="text-white font-medium">2</span>
                        </div>
                        <div class="ml-2 text-sm font-medium text-gray-900">Livraison</div>
                    </div>

                    <!-- Flèche -->
                    <div class="mx-2 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <!-- Étape Paiement -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-700 font-medium">3</span>
                        </div>
                        <div class="ml-2 text-sm font-medium text-gray-500">Confirmation</div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('client.checkout.submit') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @csrf

            <!-- Colonne de gauche - Informations de livraison -->
            <div class="space-y-6">
                <!-- Bloc Adresse -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Adresse
                        </h2>
                    </div>
                    <div class="p-8 space-y-6">
                        <!-- Nom complet -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" value="{{ old('name', auth('client')->user()->name ?? '') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 text-black block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg transition duration-200"
                                    placeholder="Votre nom complet" required>
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 text-black block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg transition duration-200"
                                    placeholder="Votre numéro de téléphone" required>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="address" value="{{ old('address') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 text-black block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg transition duration-200"
                                    placeholder="Votre adresse complète" required>
                            </div>
                        </div>

                        <!-- Pays -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pays</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <select name="country"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg transition duration-200 appearance-none text-black"
                                    required>
                                    <option value="">-- Sélectionnez un pays --</option>
                                    <option value="Côte d'Ivoire" {{ old('country') === "Côte d'Ivoire" ? 'selected' : '' }}>Côte d'Ivoire</option>
                                    <option value="Sénégal" {{ old('country') === "Sénégal" ? 'selected' : '' }}>Sénégal</option>
                                    <option value="Bénin" {{ old('country') === "Bénin" ? 'selected' : '' }}>Bénin</option>
                                </select>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes de livraison (optionnel)</label>
                            <textarea name="notes" rows="3"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full px-4 py-3 border border-gray-300 rounded-lg transition duration-200 text-black"
                                placeholder="Instructions spéciales pour la livraison...">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite - Paiement + Récapitulatif -->
            <div class="space-y-6">
                <!-- Bloc Méthodes de paiement -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Méthode de paiement
                        </h2>
                    </div>
                    <div class="p-8 space-y-4">
                        <!-- Mobile Money -->
                        <div class="relative">
                            <input type="radio" name="payment_method" value="momo" id="momo" class="sr-only peer" checked>
                            <label for="momo" class="flex p-4 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-200 hover:border-gray-300 transition-all duration-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">Mobile Money</h3>
                                        <p class="text-sm text-gray-500">MoMo / Orange Money / Wave</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Carte bancaire -->
                        <div class="relative">
                            <input type="radio" name="payment_method" value="card" id="card" class="sr-only peer">
                            <label for="card" class="flex p-4 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-200 hover:border-gray-300 transition-all duration-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">Carte bancaire</h3>
                                        <p class="text-sm text-gray-500">Visa, Mastercard, etc.</p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Paiement à la livraison -->
                        <div class="relative">
                            <input type="radio" name="payment_method" value="cash" id="cash" class="sr-only peer">
                            <label for="cash" class="flex p-4 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-200 hover:border-gray-300 transition-all duration-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">Paiement à la livraison</h3>
                                        <p class="text-sm text-gray-500">Espèces ou carte à la réception</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Bloc Récapitulatif -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                    <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Récapitulatif
                        </h2>
                    </div>
                    <div class="p-8">
                        <ul class="divide-y divide-gray-200">
                            @foreach ($cart as $productId => $item)
                            <li class="py-4 flex justify-between items-start">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden border border-gray-200 mr-4">
                                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/100' }}"
                                            alt="{{ $item['name'] }}"
                                            class="h-full w-full object-cover object-center"
                                            loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="text-base font-medium text-gray-900">{{ $item['name'] }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Quantité: {{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                                <span class="text-base font-medium text-gray-900">
                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA
                                </span>
                            </li>
                            @endforeach
                        </ul>

                        <div class="border-t border-gray-200 mt-6 pt-6 space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sous-total</span>
                                <span class="text-gray-900">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Livraison</span>
                                <span class="text-green-500">Gratuite</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold pt-4">
                                <span class="text-gray-900">Total TTC</span>
                                <span class="text-green-500">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                            </div>
                        </div>

                        <!-- Bouton de confirmation -->
                        <button type="submit"
                            class="w-full mt-8 flex justify-center items-center px-6 py-4 border border-transparent text-lg font-medium rounded-xl text-white bg-green-500 hover:to-blue-600 shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            Confirmer la commande
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des boutons radio
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                document.querySelectorAll('label[for^="payment_method"]').forEach(label => {
                    label.classList.remove('peer-checked:border-indigo-500', 'peer-checked:ring-2', 'peer-checked:ring-indigo-200');
                });
            });
        });
    });
</script>
@endpush