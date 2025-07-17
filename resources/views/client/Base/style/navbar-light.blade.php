<!-- Début de la Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Début du logo -->
        <a class="logo" href="/index">
            <span class="inline-block  dark:hidden">
                <img src="{{ asset('client/assets/images/logoG.ico') }}" class="l-dark" height="24" alt="">
                <img src="{{ asset('client/assets/images/logoG.ico') }}" class="l-light" height="24" alt="">
            </span>
            <img src="{{ asset('client/assets/images/logoG.ico') }}" height="24" class="hidden mt-4 dark:inline-block" alt="">
        </a>
        <!-- Fin du logo -->

        <!-- Bouton menu mobile -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- Fin menu mobile -->

        <!-- Boutons Connexion / Inscription -->
        <ul class="buy-button list-none mb-0">
            <li class="inline mb-0">
                <a href="{{route('client.auth.login')}}"
                    class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    <i data-feather="user" class="size-4 stroke-[3]"></i>
                </a>
            </li>
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="{{route('client.auth.signup')}}"
                    class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    S'inscrire
                </a>
            </li>
        </ul>
        <!-- Fin des boutons -->

        <div id="navigation">
            <!-- Menu de navigation -->
            <ul class="navigation-menu justify-end nav-light">

                <li><a href="{{ route('client.index') }}" class="sub-menu-item">Accueil</a></li>
                <li><a href="{{ route('client.grid.sidebar') }}" class="sub-menu-item">Nos Offres</a></li>
                <li><a href="{{ route('client.aboutus') }}" class="sub-menu-item">À propos de nous</a></li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Autres Pages</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('client.features') }}" class="sub-menu-item">Fonctionnalités</a></li>
                        <li><a href="{{ route('client.pricing') }}" class="sub-menu-item">Tarification</a></li>
                        <li><a href="{{ route('client.faqs') }}" class="sub-menu-item">FAQ</a></li>

                        {{-- <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Agents</a><span class="submenu-arrow"></span>
                            <ul class="submenu"> --}}
                                {{-- <li><a href="{{ route('client.agents') }}" class="sub-menu-item">Nos Agents</a></li> --}}
                                {{-- <li><a href="{{ route('client.agent.profile') }}" class="sub-menu-item">Profil d’agent</a></li> --}}
                            {{-- </ul>
                        </li> --}}

                        {{-- <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Agences</a><span class="submenu-arrow"></span>
                            <ul class="submenu"> --}}
                                <li><a href="{{ route('client.agencies') }}" class="sub-menu-item">Nos Partenaires</a></li>
                                {{-- <li><a href="{{ route('client.agency.profile') }}" class="sub-menu-item">Profil d’agence</a></li> --}}
                            {{-- </ul>
                        </li> --}}

                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Utilitaires</a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.terms') }}" class="sub-menu-item">Conditions d’utilisation</a></li>
                                <li><a href="{{ route('client.privacy') }}" class="sub-menu-item">Politique de confidentialité</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="{{ route('client.contact') }}" class="sub-menu-item">Contact</a></li>

            </ul><!-- Fin du menu -->
        </div><!-- Fin navigation -->
    </div><!-- Fin container -->
</nav><!-- Fin navbar -->
<!-- Fin de la Navbar -->


<!-- Script pour l’état actif (corrigé pour .sub-menu-item) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.sub-menu-item');
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                navItems.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
