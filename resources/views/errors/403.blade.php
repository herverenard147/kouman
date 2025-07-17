@extends('client.base.style.no-header')

@section('title', 'Accès refusé')

@section('content')
    <section class="relative bg-green-600/5">
        <div class="container-fluid relative">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                    <div class="text-center">
                        <a href="{{ route('client.index') }}">
                            <img src="{{ asset('client/assets/images/logoG.ico') }}" class="mx-auto" alt="">
                        </a>
                    </div>
                    <div class="title-heading text-center my-auto">
                        <img src="{{ asset('client/assets/images/error.png') }}" class="mx-auto" alt="">
                        <h1 class="mt-3 mb-6 md:text-4xl text-3xl font-bold">Accès refusé !</h1>
                        <p class="text-slate-400">Vous n'avez pas la permission d'accéder à cette page.</p>

                        <div class="mt-4">
                            <a href="{{ route('client.index') }}"
                                class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md">
                                Retour à l’accueil
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 text-slate-400">© {{ now()->year }} Afrique Évasion. Conception et développement par
                             par
                            <a href="https://kwlegaltech.com/" target="_blank" class="text-reset">Kw Legal & Tech</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
