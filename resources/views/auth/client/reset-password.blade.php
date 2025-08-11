@extends('client.base.style.no-header')
@section('title', 'Nouveau mot de passe')

@section('content')
<section class="py-36 flex items-center justify-center">
    <div class="bg-white dark:bg-slate-900 p-6 rounded shadow-md max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Nouveau mot de passe</h2>
        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <label>Nouveau mot de passe :</label>
            <input type="password" name="password" class="form-input w-full mb-4" required>

            <label>Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" class="form-input w-full mb-4" required>

            <button type="submit" class="btn bg-green-600 text-white w-full">Réinitialiser</button>
        </form>
    </div>
</section>
@endsection
