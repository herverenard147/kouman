@extends('client.base.style.no-header')
@section('title', 'Se connecter')

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
                    <a href="{{route('client.auth.login')}}"><img src="{{asset('client/assets/images/logoG.ico')}}" class="mx-auto"
                            alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Se Connecter</h5>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="text-start" action="{{route('client.auth.login.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-medium" for="LoginEmail">Email :</label>
                                <input id="LoginEmail" name="email" type="email" class="form-input mt-3"
                                    placeholder="name@example.com">
                            </div>

                            <div class="mb-4">
                                <label class="font-medium" for="LoginPassword">Mot de passe:</label>
                                <input id="LoginPassword" name="password" type="password" class="form-input mt-3" placeholder="Password:">
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input
                                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                                        type="checkbox" value="" name="remember" id="RememberMe">
                                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Se rappelez de moi</label>
                                </div>
                                <p class="text-slate-400 mb-0"><a href="{{route('client.auth.re.password')}}" class="text-slate-400">Mot
                                        de passe oublié ?</a></p>
                            </div>

                            <div class="mb-4">
                                <button type="submit"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Connexion</button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Vous n'avez pas de compte ?</span> <a href="{{route('client.auth.signup')}}"
                                    class="text-black dark:text-white font-bold">S'inscrire</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->
    
@endsection
