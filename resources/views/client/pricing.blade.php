@php
    $page = 'light';
    $fpage = 'foot';
@endphp
@extends('client.base.style.base')
@section('title', 'Tarifs')
@section('content')

    <!-- Début Hero -->
    <section
        class="relative table w-full py-32 lg:py-36 bg-[url('{{asset('client/assets/images/bg/01.jpg')}}')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Vous voulez devenir partenaire ? </br> Voici nos plans Tarifaires.</h3>
            </div><!--fin grid-->
        </div><!--fin container-->
    </section><!--fin section-->
    <div class="relative">
        <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Fin Hero -->

    <!-- Début -->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-x-[30px] gap-y-[50px]">

                <!-- code des tarifs  -->
                @include('client.base.components.pages.pricing')

            </div><!--fin grid-->
        </div><!--fin container-->

        <div class="container relative lg:mt-24 mt-16">

            <!-- code contactez-nous  -->
            @include('client.base.components.home.get-in-touch')

        </div><!--fin container-->
    </section><!--fin section-->
    <!-- Fin -->
@endsection
