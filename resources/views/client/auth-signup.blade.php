@extends('client.base.style.no-header')
@section('title', 'Inscription')

@section('content')
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">

        <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{ asset('client/assets/images/bg/01.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="/index"><img src="{{asset('client/assets/images/b.ico')}}" class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Créer un compte</h5>
                    <form class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterName">Votre nom :</label>
                                <input id="RegisterName" type="text" class="form-input mt-3" placeholder="Harry">
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Adresse email :</label>
                                <input id="LoginEmail" type="email" class="form-input mt-3"
                                    placeholder="nom@exemple.com">
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">Mot de passe :</label>
                                <input id="LoginPassword" type="password" class="form-input mt-3"
                                    placeholder="Mot de passe :">
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center mb-0">
                                    <input
                                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                                        type="checkbox" value="" id="AcceptT&C">
                                    <label class="form-check-label text-slate-400" for="AcceptT&C">
                                        J'accepte les <a href="{{route('client.terms')}}" class="text-green-600">conditions générales</a>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <a href=""
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">S'inscrire</a>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Vous avez déjà un compte ?</span>
                                <a href="{{route('client.auth.login')}}" class="text-black dark:text-white font-bold">Se connecter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->
@endsection
