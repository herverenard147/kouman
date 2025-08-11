@extends('layouts.app') {{-- ou ton layout principal --}}

@section('title', 'Mot de passe oublié')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">Réinitialiser le mot de passe</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('client.auth.re.password.send') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
                Envoyer le lien de réinitialisation
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline">Retour à la connexion</a>
        </div>
    </div>
</div>
@endsection
