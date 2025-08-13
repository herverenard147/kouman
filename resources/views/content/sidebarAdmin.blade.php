<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('client/assets/images/logoG.ico') }}" alt="Afrique évasion">
            </a>
        </div>

        <ul class="sidebar-menu border-t border-white/10" data-simplebar style="height: calc(100% - 70px);">
            {{-- Tableau de bord --}}
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="mdi mdi-view-dashboard-outline me-2"></i>Tableau de bord
                </a>
            </li>

            {{-- Clients --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-account-multiple-outline',
            'title' => 'Clients',
            'items' => [
            ['label' => 'Liste', 'route' => 'admin.clients.index'],
            ]
            ])

            {{-- Partenaires --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-handshake-outline',
            'title' => 'Partenaires',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'admin.partners.create'],
            ['label' => 'Liste', 'route' => 'admin.partners.index'],
            ]
            ])

            {{-- Commandes --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-cart-outline',
            'title' => 'Commandes',
            'items' => [
            ['label' => 'Liste', 'route' => 'admin.orders.index'], // à créer ensuite
            ]
            ])

            {{-- Profil Admin 
            <li>
                <a href="{{ route('admin.profile') }}">
            <i class="mdi mdi-account-circle-outline me-2"></i>Mon profil
            </a>
            </li>
            --}}
        </ul>
    </div>
</nav>
<!-- sidebar-wrapper -->


<!-- JavaScript to handle the active class -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('#navbar-navlist .nav-link');

        navItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all nav-links
                navItems.forEach(nav => nav.classList.remove('active'));

                // Add active class to the clicked nav-link
                this.classList.add('active');
            });
        });
    });
</script>