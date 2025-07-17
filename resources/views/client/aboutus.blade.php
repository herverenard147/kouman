@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')

@section('title', 'À propos de nous')

{{-- Contenu principal --}}
@section('content')
    {{-- Début Hero --}}
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">À propos de nous</h3>
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
    {{-- Fin Hero --}}

    {{-- Début Section --}}
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            {{-- Contrôle --}}
            @include('client.base.components.home.control')
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Comment ça fonctionne</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                {{-- Fonctionnalités --}}
                @include('client.base.components.home.features')
            </div>
        </div>
    </section>
    {{-- Fin Section --}}

    {{-- Début Appel à l'action --}}
    <section
        class="relative py-24 bg-[url('{{ asset('client/assets/images/bg/01.jpg') }}')] bg-no-repeat bg-center bg-fixed bg-cover">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="container relative">
            <div class="grid lg:grid-cols-12 grid-cols-1 md:text-start text-center justify-center">
                <div class="lg:col-start-2 lg:col-span-10">
                    <div class="grid md:grid-cols-3 grid-cols-1 items-center">
                        {{-- Appel à l’action --}}
                        @include('client.base.components.home.cta')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Fin Appel à l'action --}}

    {{-- Début Équipe & Témoignages --}}
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Rencontrez notre équipe d’agents</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
                {{-- Équipe --}}
                @include('client.base.components.home.team')
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Ce que disent nos clients</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Une excellente plateforme pour acheter, vendre et louer vos biens sans aucun agent ni commission.
                </p>
            </div>

            <div class="flex justify-center relative mt-8">
                <div class="relative w-full">
                    <div class="tiny-three-item">
                        {{-- Avis --}}
                        @include('client.base.components.home.reviews1')
                    </div>
                </div>
            </div>
        </div>

        <div class="container relative lg:mt-24 mt-16">
            {{-- Contact --}}
            @include('client.base.components.home.get-in-touch')
        </div>
    </section>
    {{-- Fin --}}
@endsection
