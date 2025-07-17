<!-- TAGLINE START-->
<div class="tagline bg-slate-900">
            <div class="container relative">
                <div class="grid grid-cols-1">
                    <div class="flex items-center justify-between">
                        <ul class="list-none">
                            <li class="inline-flex items-center">
                                <i data-feather="clock" class="text-green-600 size-4"></i>
                                <span class="ms-2 text-slate-300">Mon-Sat: 9am to 6pm</span>
                            </li>
                            <li class="inline-flex items-center ms-2">
                                <i data-feather="map-pin" class="text-green-600 size-4"></i>
                                <span class="ms-2 text-slate-300">Houston, USA 485</span>
                            </li>
                        </ul>

                        <ul class="list-none">
                            <li class="inline-flex items-center">
                                <i data-feather="mail" class="text-green-600 size-4"></i>
                                <a href="mailto:contact@example.com" class="ms-2 text-slate-300 hover:text-slate-200">contact@example.com</a>
                            </li>
                            <li class="inline-flex items-center ms-2">
                                <ul class="list-none">
                                    <li class="inline-flex mb-0"><a href="#!" class="text-slate-300 hover:text-green-600"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>
                                    <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-green-600"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>
                                    <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-green-600"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>
                                    <li class="inline-flex ms-2 mb-0"><a href="tel:+152534-468-854" class="text-slate-300 hover:text-green-600"><i data-feather="phone" class="size-4 align-middle" title="phone"></i></a></li>
                                </ul><!--end icon-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--end container-->
        </div><!--end tagline-->
        <!-- TAGLINE END-->

        <!-- Start Navbar -->
        <nav id="topnav" class="defaultscroll is-sticky tagline-height">
            <div class="container relative">

                <!-- Logo -->
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{ asset('client/assets/images/logoG.ico') }}" class="inline-block dark:hidden" alt="">
                    <img src="{{ asset('client/assets/images/logoG.ico') }}" class="hidden dark:inline-block" alt="">
                </a>

                <!-- Mobile Toggle -->
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

                <!-- Login / Signup -->
                <ul class="buy-button list-none mb-0">
                    <li class="inline mb-0">
                        <a href="{{ route('login') }}" class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                            <i data-feather="user" class="size-4 stroke-[3]"></i>
                        </a>
                    </li>
                    <li class="sm:inline ps-1 mb-0 hidden">
                        <a href="{{ route('signup') }}" class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">Signup</a>
                    </li>
                </ul>

                <!-- Navigation -->
                <div id="navigation">
                    <ul class="navigation-menu justify-end">

                        <!-- Home -->
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>
                            <ul class="submenu megamenu">
                                @for ($i = 1; $i <= 10; $i++)
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="{{ route('index.' . strtolower(\Illuminate\Support\Str::slug(\App\Helpers\HeroHelper::name($i)))) }}" class="sub-menu-item">
                                                    <div class="lg:text-center">
                                                        <span class="hidden lg:block">
                                                            <img src="{{ asset('images/demos/hero-' . $i . '.png') }}" class="img-fluid rounded shadow-md" alt="">
                                                        </span>
                                                        <span class="lg:mt-2 block">Hero {{ $i }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endfor
                            </ul>
                        </li>

                        <!-- Buy & Sell -->
                        <li><a href="{{ route('buy') }}" class="sub-menu-item">Buy</a></li>
                        <li><a href="{{ route('sell') }}" class="sub-menu-item">Sell</a></li>

                        <!-- Listing -->
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                            <ul class="submenu">

                                <!-- Grid View -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Grid View</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('listing.grid') }}" class="sub-menu-item">Grid Listing</a></li>
                                        <li><a href="{{ route('listing.grid.sidebar') }}" class="sub-menu-item">Grid Sidebar</a></li>
                                        <li><a href="{{ route('listing.grid.map') }}" class="sub-menu-item">Grid With Map</a></li>
                                    </ul>
                                </li>

                                <!-- List View -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">List View</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('listing.list') }}" class="sub-menu-item">List Listing</a></li>
                                        <li><a href="{{ route('listing.list.sidebar') }}" class="sub-menu-item">List Sidebar</a></li>
                                        <li><a href="{{ route('listing.list.map') }}" class="sub-menu-item">List With Map</a></li>
                                    </ul>
                                </li>

                                <!-- Property Detail -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Property Detail</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('listing.detail') }}" class="sub-menu-item">Property Detail</a></li>
                                        <li><a href="{{ route('listing.detail.two') }}" class="sub-menu-item">Property Detail Two</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Pages -->
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('about') }}" class="sub-menu-item">About Us</a></li>
                                <li><a href="{{ route('features') }}" class="sub-menu-item">Features</a></li>
                                <li><a href="{{ route('pricing') }}" class="sub-menu-item">Pricing</a></li>
                                <li><a href="{{ route('faqs') }}" class="sub-menu-item">Faqs</a></li>

                                <!-- Agents -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Agents</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('agents') }}" class="sub-menu-item">Agents</a></li>
                                        <li><a href="{{ route('agent.profile') }}" class="sub-menu-item">Agent Profile</a></li>
                                    </ul>
                                </li>

                                <!-- Agencies -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Agencies</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('agencies') }}" class="sub-menu-item">Agencies</a></li>
                                        <li><a href="{{ route('agency.profile') }}" class="sub-menu-item">Agency Profile</a></li>
                                    </ul>
                                </li>

                                <!-- Auth -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Auth Pages</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('login') }}" class="sub-menu-item">Login</a></li>
                                        <li><a href="{{ route('signup') }}" class="sub-menu-item">Signup</a></li>
                                        <li><a href="{{ route('password.reset') }}" class="sub-menu-item">Reset Password</a></li>
                                    </ul>
                                </li>

                                <!-- Utility -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Utility</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('terms') }}" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="{{ route('privacy') }}" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>
                                </li>

                                <!-- Blog -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Blog</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('blogs') }}" class="sub-menu-item">Blogs</a></li>
                                        <li><a href="{{ route('blog.sidebar') }}" class="sub-menu-item">Blog Sidebar</a></li>
                                        <li><a href="{{ route('blog.detail') }}" class="sub-menu-item">Blog Detail</a></li>
                                    </ul>
                                </li>

                                <!-- Special -->
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">Special</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="{{ route('comingsoon') }}" class="sub-menu-item">Comingsoon</a></li>
                                        <li><a href="{{ route('maintenance') }}" class="sub-menu-item">Maintenance</a></li>
                                        <li><a href="{{ route('error.404') }}" class="sub-menu-item">404! Error</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Contact -->
                        <li><a href="{{ route('contact') }}" class="sub-menu-item">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


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
