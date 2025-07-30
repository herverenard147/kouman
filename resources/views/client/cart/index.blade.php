@extends('content.no-sidebar')
@section('title', 'Mon Panier')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- En-tête -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                <span class="block bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-blue-500">Votre Panier</span>
            </h1>
            <div class="mt-6 flex justify-center items-center">
                <div class="flex items-center bg-white rounded-full px-6 py-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-2 text-lg font-medium text-gray-600">{{ count($cart) }} article(s)</span>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <div class="flex items-center bg-white rounded-full px-6 py-2 shadow-sm">
                    <!-- Étape Panier -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-green-600 flex items-center justify-center">
                            <span class="text-white font-medium">1</span>
                        </div>
                        <div class="ml-2 text-sm font-medium text-gray-700">Panier</div>
                    </div>
                    
                    <!-- Flèche -->
                    <div class="mx-2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    
                    <!-- Étape Livraison (active) -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-700 font-medium">2</span>
                        </div>
                        <div class="ml-2 text-sm font-medium text-gray-500">Livraison</div>
                    </div>
                    
                    <!-- Flèche -->
                    <div class="mx-2 text-gray-400">
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
        

        @if (count($cart) > 0)
        <!-- Contenu du panier - Version desktop -->
        <div class="hidden md:block bg-white rounded-2xl shadow-xl overflow-hidden mb-12 transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Article</th>
                            <th scope="col" class="px-4 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Prix</th>
                            <th scope="col" class="px-4 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Quantité</th>
                            <th scope="col" class="px-4 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Actions</th>
                            <th scope="col" class="px-4 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cart as $productId => $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <!-- Article -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden border border-gray-200 relative group">
                                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/100' }}"
                                            alt="{{ $item['name'] }}"
                                            class="h-full w-full object-cover object-center transition-transform duration-300 group-hover:scale-105"
                                            loading="lazy">
                                        <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-base font-semibold text-gray-900">{{ $item['name'] }}</div>
                                        <div class="text-xs text-gray-500 mt-1">Réf: {{ substr(md5($item['name']), 0, 8) }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Prix unitaire -->
                            <td class="px-4 py-4">
                                <div class="text-base font-medium text-gray-900">
                                    {{ number_format($item['price'], 0, ',', ' ') }} FCFA
                                </div>
                            </td>

                            <!-- Quantité - Version améliorée -->
                            <td class="px-4 py-4">
                                <form data-update-url="{{ route('client.cart.update', $productId) }}" method="POST" class="cart-update-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden w-32 bg-white">
                                        <!-- Bouton - -->
                                        <button type="button"
                                            class="decrement-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors flex items-center justify-center border-r border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>

                                        <!-- Champ de saisie -->
                                        <input type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            class="quantity-input w-12 text-center border-0 focus:ring-0 focus:outline-none text-base font-medium text-gray-900"
                                            data-product-id="{{ $productId }}">

                                        <!-- Bouton + -->
                                        <button type="button"
                                            class="increment-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors flex items-center justify-center border-l border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-4">
                                <form action="{{ route('client.cart.remove', $productId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700 transition-colors p-2 rounded-full hover:bg-red-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>

                            <!-- Total -->
                            <td class="px-4 py-4">
                                <div class="text-base font-bold text-indigo-600">
                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Version mobile -->
        <div class="md:hidden space-y-4 mb-8">
            @foreach ($cart as $productId => $item)
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-4">
                    <!-- En-tête article mobile -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-20 w-20 rounded-lg overflow-hidden border border-gray-200 mr-4">
                            <img src="{{ $item['image'] ?? 'https://via.placeholder.com/100' }}"
                                alt="{{ $item['name'] }}"
                                class="h-full w-full object-cover object-center"
                                loading="lazy">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Réf: {{ substr(md5($item['name']), 0, 8) }}</p>

                            <div class="mt-2 flex justify-between items-center">
                                <span class="text-base font-bold text-indigo-600">
                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA
                                </span>
                                <form action="{{ route('client.cart.remove', $productId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Détails mobile -->
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Prix unitaire</p>
                                <p class="text-base font-medium text-gray-900">
                                    {{ number_format($item['price'], 0, ',', ' ') }} FCFA
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Quantité</p>
                                <form data-update-url="{{ route('client.cart.update', $productId) }}" method="POST" class="cart-update-form mt-1">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden w-full max-w-[120px]">
                                        <!-- Bouton - -->
                                        <button type="button"
                                            class="decrement-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>

                                        <!-- Champ de saisie -->
                                        <input type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            class="quantity-input w-12 text-center border-0 focus:ring-0 focus:outline-none text-base font-medium text-gray-900"
                                            data-product-id="{{ $productId }}">

                                        <!-- Bouton + -->
                                        <button type="button"
                                            class="increment-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Récapitulatif -->
        <div class="flex flex-col items-end space-y-6">
            <div class="w-full md:w-2/5 bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                    </svg>
                    Récapitulatif
                </h3>

                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="text-lg text-gray-600">Sous-total</span>
                        <span class="text-lg font-medium text-gray-900">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <span class="text-lg text-gray-600">Livraison</span>
                        <span class="text-lg font-medium text-green-500">Gratuite</span>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <span class="text-xl font-bold text-gray-900">Total TTC</span>
                        <span class="text-2xl font-bold text-indigo-600">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('client.checkout') }}" class="w-full flex justify-center items-center px-6 py-4 border border-transparent text-lg font-medium rounded-xl text-white bg-green-600 hover:from-indigo-700 hover:to-blue-600 shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        Passer la commande
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @else
        <!-- Panier vide -->
        <div class="text-center py-16">
            <div class="mx-auto h-48 w-48 flex items-center justify-center bg-indigo-50 rounded-full mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold text-white mb-4">Votre panier est vide</h2>
            <p class="text-xl text-white max-w-md mx-auto mb-8">Commencez votre shopping et découvrez nos produits exceptionnels</p>
            <div>
                <a href="{{ route('client.grid.sidebar') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-xl text-white bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    Explorer la boutique
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion des quantités
        document.querySelectorAll('.quantity-input').forEach(input => {
            const form = input.closest('.cart-update-form');
            if (!form) return;

            const decBtn = form.querySelector('.decrement-btn');
            const incBtn = form.querySelector('.increment-btn');

            const sendUpdate = (val) => {
                const url = form.getAttribute('data-update-url');
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            quantity: val,
                            _method: 'PUT'
                        })
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            // Recharge la page pour recalculer totaux/compteurs
                            window.location.reload();
                        } else {
                            console.error('Mise à jour échouée', data);
                        }
                    })
                    .catch(err => console.error('Erreur maj panier :', err));
            };

            if (decBtn) {
                decBtn.addEventListener('click', () => {
                    const val = Math.max(0, parseInt(input.value || '0', 10) - 1);
                    input.value = val;
                    sendUpdate(val);
                });
            }

            if (incBtn) {
                incBtn.addEventListener('click', () => {
                    const val = Math.max(0, parseInt(input.value || '0', 10) + 1);
                    input.value = val;
                    sendUpdate(val);
                });
            }

            input.addEventListener('change', () => {
                let val = parseInt(input.value || '0', 10);
                if (isNaN(val) || val < 0) val = 0;
                input.value = val;
                sendUpdate(val);
            });
        });

        // Suppression avec confirmation (SweetAlert2 si dispo, sinon confirm())
        window.confirmDelete = function(button) {
            const submitForm = () => button.closest('form').submit();

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Confirmation',
                    text: "Voulez-vous vraiment retirer cet article du panier ?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) submitForm();
                });
            } else {
                if (confirm('Voulez-vous vraiment retirer cet article du panier ?')) {
                    submitForm();
                }
            }
        }
    });
</script>
@endpush