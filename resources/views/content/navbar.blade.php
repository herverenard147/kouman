{{-- Ajout de bg-white dark:bg-slate-900 pour le fond de la navbar --}}
<div class="top-header bg-white dark:bg-slate-900 shadow-sm"> {{-- Ajout d'une ombre légère --}}
    <div class="header-bar flex justify-between">
        <div class="flex items-center space-x-1">
            <a href="{{ route('client.index') }}" class="xl:hidden block me-2">
                {{-- Si ces images doivent changer en mode sombre, tu auras besoin de logique JS ou de deux images différentes --}}
                <img src="{{ asset('client/assets/images/logoG.ico') }}" class="md:hidden block" alt="Afrique Évasion">
                <span class="md:block hidden">
                    <img src=" {{ asset('client/assets/images/logoG.ico') }}" class=" h-5" alt="Afrique Évasion">
                    <img src=" {{ asset('client/assets/images/logoG.ico') }}" class="hidden" alt="Afrique Évasion">
                </span>
            </a>
            {{-- <a href="{{ route('client.index') }}" class="block max-[1179px]:block min-[1182px]:hidden me-2">
                <img src="{{ asset('client/assets/images/logoG.ico') }}" alt="Afrique Évasion" class="h-8">
            </a> --}}
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
                        text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 focus:ring-0" name="s" id="searchItem" placeholder="Recherche...">
                </div>
            </div>
        </div>

        <ul class="list-none mb-0 space-x-1">
            @php
                $admin = auth('admin')->user();
                $user = auth()->user();
            @endphp

            @if($admin)
                {{-- Menu spécifique administrateur --}}
                <li class="dropdown inline-block relative">
                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                        dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md" type="button">
                        <span class="me-2">{{ $admin->nom }}</span>
                        <img src="{{ asset('images/admin-avatar.png') }}" class="rounded-md size-8" alt="Admin Avatar">
                    </button>
                    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white shadow hidden dark:bg-slate-800" onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200">
                                    <i class="mdi mdi-view-dashboard me-2"></i> Tableau de bord
                                </a>
                            </li>

                            <li class="border-t border-gray-200 dark:border-gray-700 my-2"></li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left py-1 px-4 hover:text-green-600 bg-transparent border-0 text-slate-700 dark:text-gray-200">
                                        <i class="mdi mdi-logout me-2"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>

            @elseif($user)
                {{-- Menu utilisateur normal --}}
                <li class="dropdown inline-block relative">
                    <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                        <span class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 hover:bg-gray-100 border border-gray-100 text-slate-900
                            dark:bg-slate-800 dark:hover:bg-slate-700 dark:border-slate-700 dark:text-white rounded-md">
                            <img src="{{ asset('images/client/07.jpg') }}" class="rounded-md" alt="User Avatar">
                        </span>
                    </button>
                    <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md overflow-hidden bg-white shadow hidden dark:bg-slate-800" onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                <a href="{{ route('partenaire.profile') }}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-account-outline me-2"></i>Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('partenaire.chat') }}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-chat-outline me-2"></i>Chat</a>
                            </li>
                            <li>
                                <a href="{{ route('partenaire.profile-setting') }}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-cog-outline me-2"></i>Settings</a>
                            </li>
                            <li class="border-t border-gray-200 dark:border-gray-700 my-2"></li>
                            <li>
                                <a href="{{ route('partenaire.lock-screen') }}" class="block py-1 px-4 hover:text-green-600 text-slate-700 dark:text-gray-200"><i class="mdi mdi-lock-outline me-2"></i>Lockscreen</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left py-1 px-4 hover:text-green-600 bg-transparent border-0 text-slate-700 dark:text-gray-200">
                                        <i class="mdi mdi-logout me-2"></i>Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>

            @else
                {{-- Pas connecté --}}
                <li>
                    <a href="{{ route('login') }}" class="inline-block py-2 px-4 rounded-md text-slate-900 bg-green-500 hover:bg-green-600 dark:text-white">Connexion</a>
                </li>
            @endif
        </ul>
    </div>
</div>
