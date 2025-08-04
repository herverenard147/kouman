@extends('client.base.style.no-header')
@section('title', 'Mot de passe oublié')

@section('content')
<section class="md:h-screen py-36 flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-6 rounded shadow">
        <h2 class="text-2xl text-gray-600 font-bold mb-6">Réinitialiser votre mot de passe</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="block mb-2 font-medium text-gray-600">Votre email</label>
            <input id="email" type="email" name="email" required class="form-input w-full mb-4" placeholder="name@example.com">

            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded w-full py-2">
                Envoyer le lien de réinitialisation
            </button>
        </form>
    </div>
</section>
@endsection
