{{-- Ajout de bg-white dark:bg-slate-900 pour le fond de la navbar --}}
<div class="top-header bg-white dark:bg-slate-900 shadow-sm"> {{-- Ajout d'une ombre légère --}}
    <div class="header-bar flex justify-between">
        <div class="flex items-center space-x-1">
            <a href="#" class="xl:hidden block me-2">
                {{-- Si ces images doivent changer en mode sombre, tu auras besoin de logique JS ou de deux images différentes --}}
                <img src="{{ asset('images/logo-icon-32.png') }}" class="md:hidden block" alt="">
                <span class="md:block hidden">
                    <img src=" {{ asset('images/di.ico') }}" class="inline-block" alt="">
                    <img src=" {{ asset('client/assets/images/logoG.ico') }}" class="hidden" alt="">
                </span>
            </a>
            {{-- Adaptation des couleurs du bouton --}}
            <a id="close-sidebar" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md" href="javascript:void(0)">
                <i data-feather="menu" class="size-4"></i>
            </a>
            <div class="ps-1.5">
                <div class="form-icon relative sm:block hidden">
                    {{-- Adaptation de la couleur de l'icône de recherche --}}
                    <i class="mdi mdi-magnify absolute top-1/2 -translate-y-1/2 mt-[1px] start-3 text-gray-500 dark:text-gray-400"></i>
                    {{-- Adaptation des couleurs du champ de recherche --}}
                    <input type="text" class="form-input w-56 ps-9 py-2 px-3 h-8 rounded-md outline-none border
                        bg-white dark:bg-slate-700 border-gray-200 dark:border-gray-600
                        text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 focus:ring-0" name="s" id="searchItem" placeholder="Search...">
                </div>
            </div>
            </div>

        <ul class="list-none mb-0 space-x-1">
            <li class="dropdown inline-block relative">
                {{-- Adaptation des couleurs du bouton --}}
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                    dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md" type="button">
                    <img src="{{ asset('images/flags/usa.png') }}" class="size-6 rounded-md" alt="">
                </button>
                {{-- Adaptation des couleurs du menu déroulant --}}
                <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-36 rounded-md overflow-hidden bg-white shadow hidden dark:bg-slate-800" onclick="event.stopPropagation();">
                    <ul class="list-none py-2 text-start">
                        <li class="my-1">
                            {{-- Adaptation des couleurs des liens du menu déroulant --}}
                            <a href="" class="flex items-center text-[15px] font-medium py-1.5 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><img src="{{ asset('images/flags/germany.png') }}" class="size-6 rounded-md me-2 shadow" alt=""> German</a>
                        </li>
                        <li class="my-1">
                            <a href="" class="flex items-center text-[15px] font-medium py-1.5 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><img src="{{ asset('images/flags/italy.png') }}" class="size-6 rounded-md me-2 shadow" alt=""> Italian</a>
                        </li>
                        <li class="my-1">
                            <a href="" class="flex items-center text-[15px] font-medium py-1.5 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><img src="{{ asset('images/flags/russia.png') }}" class="size-6 rounded-md me-2 shadow" alt=""> Russian</a>
                        </li>
                        <li class="my-1">
                            <a href="" class="flex items-center text-[15px] font-medium py-1.5 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><img src="{{ asset('images/flags/spain.png') }}" class="size-6 rounded-md me-2 shadow" alt=""> Spanish</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown inline-block relative">
                {{-- Adaptation des couleurs du bouton --}}
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                    dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md" type="button">
                    <i data-feather="bell" class="size-4"></i>
                    <span class="absolute top-0 end-0 flex items-center justify-center bg-red-600 text-white text-[10px] font-bold rounded-md size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-red-600 after:top-0 after:end-0 after:rounded-md after:animate-ping"></span>
                </button>
                {{-- Adaptation des couleurs du menu déroulant et des bordures internes --}}
                <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-64 rounded-md overflow-hidden bg-white shadow hidden dark:bg-slate-800" onclick="event.stopPropagation();">
                    {{-- Adaptation du texte "Notifications" --}}
                    <span class="px-4 py-4 flex justify-between text-slate-900 dark:text-white">
                        <span class="font-semibold">Notifications</span>
                        <span class="flex items-center justify-center bg-red-600/20 text-red-600 text-[10px] font-bold rounded-md w-5 max-h-5 ms-1">3</span>
                    </span>
                    {{-- Adaptation des bordures des notifications --}}
                    <ul class="py-2 text-start h-64 border-t border-gray-200 dark:border-gray-700" data-simplebar>
                        <li>
                            {{-- Adaptation des couleurs des liens et des textes secondaires --}}
                            <a href="#!" class="block font-medium py-1.5 px-4 text-slate-700 dark:text-gray-200">
                                <div class="flex items-center">
                                    <div class="size-10 rounded-md shadow shadow-green-600/10 bg-green-600/10 text-green-600 flex items-center justify-center">
                                        <i data-feather="shopping-cart" class="size-4"></i>
                                    </div>
                                    <div class="ms-2">
                                        <span class="text-[15px] font-medium block">Order Complete</span>
                                        <small class="text-gray-600 dark:text-gray-400">15 min ago</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4 text-slate-700 dark:text-gray-200">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/client/04.jpg') }}" class="size-10 rounded-md shadow" alt="">
                                    <div class="ms-2">
                                        <span class="text-[15px] font-medium block"><span class="font-semibold">Message</span> from Luis</span>
                                        <small class="text-gray-600 dark:text-gray-400">1 hour ago</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4 text-slate-700 dark:text-gray-200">
                                <div class="flex items-center">
                                    <div class="size-10 rounded-md shadow shadow-green-600/10 bg-green-600/10 text-green-600 flex items-center justify-center">
                                        <i data-feather="dollar-sign" class="size-4"></i>
                                    </div>
                                    <div class="ms-2">
                                        <span class="text-[15px] font-medium block"><span class="font-semibold">One Refund Request</span></span>
                                        <small class="text-gray-600 dark:text-gray-400">2 hour ago</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4 text-slate-700 dark:text-gray-200">
                                <div class="flex items-center">
                                    <div class="size-10 rounded-md shadow shadow-green-600/10 bg-green-600/10 text-green-600 flex items-center justify-center">
                                        <i data-feather="truck" class="size-4"></i>
                                    </div>
                                    <div class="ms-2">
                                        <span class="text-[15px] font-medium block">Deliverd your Order</span>
                                        <small class="text-gray-600 dark:text-gray-400">Yesterday</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="block font-medium py-1.5 px-4 text-slate-700 dark:text-gray-200">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/client/05.jpg') }}" class="size-10 rounded-md shadow" alt="">
                                    <div class="ms-2">
                                        <span class="text-[15px] font-medium block"><span class="font-semibold">Cally</span> started following you</span>
                                        <small class="text-gray-600 dark:text-gray-400">2 days ago</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li><li class="dropdown inline-block relative">
                {{-- Adaptation des couleurs du bouton (image de profil) --}}
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                    <span class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                        dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md"><img src="{{ asset('images/client/07.jpg') }}" class="rounded-md" alt=""></span>
                </button>
                {{-- Adaptation des couleurs du menu déroulant et des bordures internes --}}
                <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white shadow hidden dark:bg-slate-800" onclick="event.stopPropagation();">
                    <ul class="py-2 text-start">
                        <li>
                            {{-- Adaptation des couleurs des liens du menu déroulant --}}
                            <a href="{{route('partenaire.profile')}}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-account-outline me-2"></i>Profile</a>
                        </li>
                        <li>
                            <a href="{{route('partenaire.chat')}}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-chat-outline me-2"></i>Chat</a>
                        </li>
                        <li>
                            <a href="{{route('partenaire.profile-setting')}}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-cog-outline me-2"></i>Settings</a>
                        </li>
                        {{-- Adaptation des bordures du menu déroulant --}}
                        <li class="border-t border-gray-200 dark:border-gray-700 my-2"></li>
                        <li>
                            <a href="{{route('partenaire.lock-screen')}}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-lock-outline me-2"></i>Lockscreen</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                {{-- Adaptation des couleurs du bouton de déconnexion --}}
                                <button type="submit" class="block w-full text-left py-1 px-4 hover:text-green-600 bg-transparent border-0 text-slate-700 dark:text-gray-200">
                                    <i class="mdi mdi-logout me-2"></i>Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li></ul>
    </div>
</div>
