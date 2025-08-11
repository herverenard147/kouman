@extends('client.base.style.no-header')
@section('title', 'Mot de passe oublié')

@section('content')
<section class="py-36 flex items-center justify-center">
    <div class="bg-white dark:bg-slate-900 p-6 rounded shadow-md max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Réinitialiser votre mot de passe</h2>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label>Email :</label>
            <input type="email" name="email" class="form-input w-full mb-4" required>
            <button type="submit" class="btn bg-green-600 text-white w-full">Envoyer le lien</button>
        </form>
    </div>
</section>
@endsection
