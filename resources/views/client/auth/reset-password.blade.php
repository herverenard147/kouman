@extends('client.base.style.no-header')
@section('title', 'Nouveau mot de passe')

@section('content')
<section class="md:h-screen py-36 flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Créer un nouveau mot de passe</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <label for="password" class="block mb-2 font-medium">Nouveau mot de passe</label>
            <input id="password" type="password" name="password" required class="form-input w-full mb-4" autocomplete="new-password">

            <label for="password_confirmation" class="block mb-2 font-medium">Confirmer le nouveau mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="form-input w-full mb-6" autocomplete="new-password">

            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded w-full py-2">
                Réinitialiser le mot de passe
            </button>
        </form>
    </div>
</section>
@endsection
