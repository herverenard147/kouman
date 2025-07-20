<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{route('index')}}"><img src="{{ asset('client/assets/images/logoG.ico') }}" alt=""></a>
        </div>

        <ul class="sidebar-menu border-t border-white/10" data-simplebar style="height: calc(100% - 70px);">
            <li>
                <a href="{{route('partenaire.dashboard')}}"><i class="mdi mdi-chart-bell-curve-cumulative me-2"></i>Tableau de bord</a>
            </li>

            <li>
                <a href="{{route('partenaire.hebergement')}}"><i class="mdi mdi-home-city me-2"></i>Mes Propriétés</a>
            </li>

            @if (Auth::guard('partenaire')->user()->type == 'residence')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Hebergement</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.hebergement')}}">Ajouter</a></li>
                            <li><a href="{{route('partenaire.hebergement')}}"> Liste</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Evenement</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.event')}}">Ajouter </a></li>
                            <li><a href="{{route('partenaire.event')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Excursion</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.excursion')}}"> Ajouter</a></li>
                            <li><a href="{{route('partenaire.excursion')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (Auth::guard('partenaire')->user()->type == 'hotel')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Evenement</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.event')}}">Ajouter </a></li>
                            <li><a href="{{route('partenaire.event')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Excursion</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.excursion')}}"> Ajouter</a></li>
                            <li><a href="{{route('partenaire.excursion')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (Auth::guard('partenaire')->user()->type == 'agence_voyage')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Vol</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.vol')}}">Ajouter</a></li>
                            <li><a href="{{route('')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Excursion</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.excursion')}}"> Ajouter</a></li>
                            <li><a href="{{route('partenaire.excursion')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (Auth::guard('partenaire')->user()->type == 'compagnie_aerienne')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Vol</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.vol')}}">Ajouter</a></li>
                            <li><a href="{{route('')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (Auth::guard('partenaire')->user()->type == 'evenementiel')
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Evenement</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.event')}}">Ajouter </a></li>
                            <li><a href="{{route('partenaire.event')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Excursion</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{route('partenaire.add.excursion')}}"> Ajouter</a></li>
                            <li><a href="{{route('partenaire.excursion')}}">Liste</a></li>
                        </ul>
                    </div>
                </li>
            @endif
            <li>
                <a href="{{route('partenaire.favorite-hebergement')}}"><i class="mdi mdi-home-heart me-2"></i>Favorite Properties</a>
            </li>

            {{-- <li>
                <a href="{{route('partenaire.chat')}}"><i class="mdi mdi-chat-outline me-2"></i>Chat</a>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="mdi mdi-account-edit me-2"></i>User Profile</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('partenaire.profile')}}">Profile</a></li>
                        <li><a href="{{route('partenaire.profile-setting')}}">Profile Settings</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="mdi mdi-post-outline me-2"></i>Blog</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('partenaire.blog')}}">Blogs</a></li>
                        <li><a href="{{route('partenaire.blog-detail')}}">Blog Detail</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="mdi mdi-file-document-outline me-2"></i>Pages</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('partenaire.starter')}}">Starter</a></li>
                        <li><a href="{{route('partenaire.faqs')}}">FAQs</a></li>
                        <li><a href="{{route('partenaire.pricing')}}">Pricing</a></li>
                        <li><a href="{{route('partenaire.review')}}">Review</a></li>
                        <li><a href="{{route('partenaire.privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('partenaire.terms')}}">Term & Condition</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="mdi mdi-login me-2"></i>Authentification</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('partenaire.login')}}">Connexion</a></li>
                        <li><a href="{{route('signup')}}">Signup</a></li>
                        <li><a href="{{route('partenaire.signup-success')}}">Signup Success</a></li>
                        <li><a href="{{route('partenaire.reset-password')}}">Reset Password</a></li>
                        <li><a href="{{route('partenaire.lock-screen')}}">Lockscreen</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="mdi mdi-layers me-2"></i>Miscellaneous</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('partenaire.comingsoon')}}">Comingsoon</a></li>
                        <li><a href="{{route('partenaire.maintenance')}}">Maintenance</a></li>
                        <li><a href="{{route('partenaire.error')}}">Error</a></li>
                        <li><a href="{{route('partenaire.thankyou')}}">Thank You</a></li>
                    </ul>
                </div>
            </li>

            <li class="relative lg:m-8 m-6 px-8 py-10 rounded-lg bg-gradient-to-b to-transparent from-slate-800 text-center">
                <span class="relative z-10">
                    <span class="text-xl font-medium h5 text-white">Upgrade to Pro</span>

                    <span class="text-slate-400 mt-3 mb-5 block">Get one month free and subscribe to pro</span>

                    <a href="https://1.envato.market/hously-php" target="_blank" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle transition duration-500 ease-in-out text-base text-center bg-gray-500/5 hover:bg-gray-500 border-gray-500/10 hover:border-gray-500 text-white rounded-md">Subscribe</a>
                </span>

                <span class="mdi mdi-home-city-outline text-[160px] absolute top-1/2 -translate-y-1/2 start-0 end-0 mx-auto text-center opacity-[0.02] text-white z-0"></span>
            </li> --}}
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->



<!-- JavaScript to handle the active class -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navItems = document.querySelectorAll('#navbar-navlist .nav-link');

        navItems.forEach(item => {
            item.addEventListener('click', function () {
                // Remove active class from all nav-links
                navItems.forEach(nav => nav.classList.remove('active'));

                // Add active class to the clicked nav-link
                this.classList.add('active');
            });
        });
    });
</script>
