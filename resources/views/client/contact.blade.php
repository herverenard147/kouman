@php
    $page = 'light';
    $fpage = 'foot1';
@endphp
@extends('client.base.style.base')

{{-- @section('navlink')
    @include('client.base.style.navbar-dark')
@endsection --}}
@section('title', 'Contactez nous')

@section('content')
    <!-- Google Map -->
    <div class="container-fluid relative mt-20">
        <div class="grid grid-cols-1">
            <div class="w-full leading-[0] border-0">
                {{-- <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                <iframe
                    src="
                        https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3776.0354530365057!2d-4.025226325256714!3d5.325503694652991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eba100183785%3A0xc6e997b2eae0b484!2sImmeuble%20Longchamp%20Du%20Plateau!5e1!3m2!1sfr!2sci!4v1753294573391!5m2!1sfr!2sci"
                    style="border:0" class="w-full h-[500px]" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <!-- Google Map -->

    <!-- Start Section-->
    <section class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">

                <!-- SVG Illustration -->
                <div class="lg:col-span-7 md:col-span-6">
                    <img src="{{ asset('client/assets/images/svg/contact.svg') }}" alt="Contact Illustration">
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:me-5">
                        <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-700 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>
                            @if (session('success'))
                                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.envoyer') }}" method="POST" id="myForm">
                            @csrf
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                        <label for="name" class="font-medium">Votre Nom:</label>
                                        <input name="name" id="name" value="{{ old('name') }}" type="text" class="form-input mt-2"
                                            placeholder="Nom :" required>
                                    </div>

                                    <div class="lg:col-span-6 mb-5">
                                        <label for="email" class="font-medium">Votre Email:</label>
                                        <input name="email" id="email" value="{{ old('email') }}" type="email" class="form-input mt-2"
                                            placeholder="Email :" required>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                        <label for="subject" class="font-medium">Votre Question:</label>
                                        <input name="subject" id="subject" value="{{ old('subject') }}" class="form-input mt-2"
                                            placeholder="Sujet :" required>
                                    </div>

                                    <div class="mb-5">
                                        <label for="comments" class="font-medium">Votre Commentaire:</label>
                                        <textarea name="comments" id="comments" class="form-input mt-2 textarea" placeholder="Message :" required>{{ old('comments') }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" name="send"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Envoyer le Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Contact cards -->
        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                @include('client.base.components.contact.contact')
            </div>
        </div>
    </section>
    <!-- End Section -->
@endsection
