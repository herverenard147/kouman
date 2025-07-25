@extends('layout.base')

@section('title', 'Modifier mon compte')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="grid grid-cols-1">
                <div class="profile-banner relative text-transparent rounded-md shadow overflow-hidden">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)">
                    <div class="relative shrink-0">
                        <img src="{{asset('/images/bg.jpg')}}" class="h-80 w-full object-cover" id="profile-banner" alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 gap-6 mt-6">
                <div class="xl:col-span-3 lg:col-span-4 md:col-span-4">
                    <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                        <div class="profile-pic text-center">
                            <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                            <div>
                                <div class="relative size-24 mx-auto">
                                    <img src="{{asset('/images/client/07.jpg')}}" class="rounded-full shadow ring-4 ring-slate-50 dark:ring-slate-700" id="profile-image" alt="">
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>

                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold text-slate-900 dark:text-white">Calvin Carlo</h5>
                                    <p class="text-slate-400">calvin@hotmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-9 lg:col-span-8 md:col-span-8">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Détails personnels :</h5>
                            <form>
                                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Prénom : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                            <input type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Prénom :" id="firstname" name="name" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Nom : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user-check" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                            <input type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Nom :" id="lastname" name="name" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Email : <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                            <input type="email" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Profession :</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="bookmark" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                            <input name="name" id="occupation" type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Profession :">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mt-5">
                                        <label class="form-label font-medium text-slate-900 dark:text-white">Description :</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="message-circle" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                            <textarea name="comments" id="comments" class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5" value="Enregistrer les modifications">
                            </form>
                        </div>

                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
                                <div>
                                    <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Coordonnées :</h5>
                                    <form>
                                        <div class="grid grid-cols-1 gap-5">
                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Téléphone :</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="phone" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                                    <input name="number" id="number" type="number" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Téléphone :">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Site Web :</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="globe" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                                    <input name="url" id="url" type="url" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="URL :">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">Ajouter</button>
                                    </form>
                                </div>

                                <div>
                                    <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Changer le mot de passe :</h5>
                                    <form>
                                        <div class="grid grid-cols-1 gap-5">
                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Ancien mot de passe :</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="key" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                                    <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Ancien mot de passe" required>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Nouveau mot de passe :</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="key" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                                    <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Nouveau mot de passe" required>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">Confirmer le mot de passe :</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="key" class="size-4 absolute top-3 start-4 text-slate-400"></i>
                                                    <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:text-white dark:border-slate-700 border border-gray-200 focus:border-green-600 focus:ring-0" placeholder="Confirmer le mot de passe" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">Enregistrer le mot de passe</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 relative rounded-md shadow bg-white dark:bg-slate-800">
                            <h5 class="text-lg font-semibold mb-4 text-red-600">Supprimer le compte :</h5>
                            <p class="text-slate-400 mb-4">Voulez-vous supprimer votre compte ? Cliquez sur le bouton « Supprimer » ci-dessous.</p>
                            <a href="" class="btn bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
