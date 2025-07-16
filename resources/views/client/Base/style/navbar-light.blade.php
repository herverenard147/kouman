<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Start Logo container-->
        <a class="logo" href="/index">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('client/assets/images/logo-dark.png') }}" class="l-dark" height="24" alt="">
                <img src="{{ asset('client/assets/images/logo-light.png') }}" class="l-light" height="24" alt="">
            </span>
            <img src="{{ asset('client/images/logo-light.png') }}" height="24" class="hidden dark:inline-block"
                alt="">
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
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
        <!-- End Mobile Toggle -->

        <!--Login button Start-->
        <ul class="buy-button list-none mb-0">
            <li class="inline mb-0">
                <a href="{{route('client.auth.login')}}"
                    class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"><i
                        data-feather="user" class="size-4 stroke-[3]"></i></a>
            </li>
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="{{route('client.auth.signup')}}"
                    class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">S'inscrire</a>
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-end nav-light">
                {{-- <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>

                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li>
                                    <a href="/index" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-one.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero One</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/index-two" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-two.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Two</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <ul>
                                <li>
                                    <a href="/index-three" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-three.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Three</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/index-four" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-four.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Four</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <ul>
                                <li>
                                    <a href="/index-five" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-five.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Five</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/index-six" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-six.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Six</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <ul>
                                <li>
                                    <a href="/index-seven" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-seven.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Seven</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/index-eight" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-eight.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Eight</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <ul>
                                <li>
                                    <a href="/index-nine" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-nine.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Nine</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="/index-ten" class="sub-menu-item">
                                        <div class="lg:text-center">
                                            <span class="hidden lg:block"><img
                                                    src="{{ asset('client/assets/images/demos/hero-ten.png') }}"
                                                    class="img-fluid rounded shadow-md" alt=""></span>
                                            <span class="lg:mt-2 block">Hero Ten</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}


                <li><a href="{{ route('client.index') }}" class="sub-menu-item">Home</a></li>
                {{-- <li><a href="{{ route('client.buy') }}" class="sub-menu-item">Buy</a></li> --}}

                {{-- <li><a href="{{ route('client.sell') }}" class="sub-menu-item">Sell</a></li> --}}
                <li><a href="{{ route('client.grid.sidebar') }}" class="sub-menu-item">Nos offres</a></li>

                {{-- <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Grid View </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.grid') }}" class="sub-menu-item">Grid Listing</a></li>
                                <li><a href="{{ route('client.grid.sidebar') }}" class="sub-menu-item">Grid Sidebar </a></li>
                                <li><a href="{{ route('client.grid.map') }}" class="sub-menu-item">Grid With Map</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> List View </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.list') }}" class="sub-menu-item">List Listing</a></li>
                                <li><a href="{{ route('client.list.sidebar') }}" class="sub-menu-item">List Sidebar </a></li>
                                <li><a href="{{ route('client.list.map') }}" class="sub-menu-item">List With Map</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Property
                                Detail</a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.property.detail') }}" class="sub-menu-item">Property Detail</a></li>
                                <li><a href="{{ route('client.property.detail.two') }}" class="sub-menu-item">Property Detail Two</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('client.aboutus') }}" class="sub-menu-item">A propos de Nous</a></li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Autres Pages</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('client.features') }}" class="sub-menu-item">Fonctionnalités</a></li>
                        <li><a href="{{ route('client.pricing') }}" class="sub-menu-item">Tarification</a></li>
                        <li><a href="{{ route('client.faqs') }}" class="sub-menu-item">Faqs</a></li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Agents</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.agents') }}" class="sub-menu-item">Agents</a></li>
                                <li><a href="{{ route('client.agent.profile') }}" class="sub-menu-item">Agent Profile</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Agencies</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.agencies') }}" class="sub-menu-item">Agencies</a></li>
                                <li><a href="{{ route('client.agency.profile') }}" class="sub-menu-item">Agency Profile</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.terms') }}" class="sub-menu-item">Terms of Services</a></li>
                                <li><a href="{{ route('client.privacy') }}" class="sub-menu-item">Privacy Policy</a></li>
                            </ul>
                        </li>
                        {{-- <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.blogs') }}" class="sub-menu-item"> Blogs</a></li>
                                <li><a href="{{ route('client.blog.sidebar') }}" class="sub-menu-item"> Blog Sidebar</a></li>
                                <li><a href="{{ route('client.blog.detail') }}" class="sub-menu-item"> Blog Detail</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('client.comingsoon') }}" class="sub-menu-item">Comingsoon</a></li>
                                <li><a href="{{ route('client.maintenance') }}" class="sub-menu-item">Maintenance</a></li>
                                <li><a href="{{ route('client.error.404') }}" class="sub-menu-item">404! Error</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>

                <li><a href="{{ route('client.contact') }}" class="sub-menu-item">Contact</a></li>
                <div class="absolute top-5 right-5 z-50">
                    <form method="GET" action="">
                        <select onchange="window.location.href='/lang/' + this.value" class="rounded-md border-gray-300 text-sm p-2">
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>FR</option>
                            <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
                        </select>
                    </form>
                </div>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->


<!-- JavaScript to handle the active class (corrigé pour cibler .sub-menu-item) -->
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
