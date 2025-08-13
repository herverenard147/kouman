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

            {{-- Mes propriétés (commune à tous) --}}
            <li>
                <a href="{{ route('partenaire.hebergement') }}">
                    <i class="mdi mdi-home-city me-2"></i>Mes Propriétés
                </a>
            </li>

            {{-- Hebergement / Résidence --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Hebergement',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'partenaire.add.hebergement'],
            ['label' => 'Liste', 'route' => 'partenaire.hebergement'],
            ]
            ])

            {{-- Chambre / Hotel --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Chambre',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'partenaire.add.chambre'],
            ['label' => 'Liste', 'route' => 'partenaire.chambre'],
            ]
            ])

            {{-- Événement --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Evenement',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'partenaire.add.event'],
            ['label' => 'Liste', 'route' => 'partenaire.event'],
            ]
            ])

            {{-- Excursion --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Excursion',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'partenaire.add.excursion'],
            ['label' => 'Liste', 'route' => 'partenaire.excursion'],
            ]
            ])

            {{-- Vol --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Vol',
            'items' => [
            ['label' => 'Ajouter', 'route' => 'partenaire.add.vol'],
            // ['label' => 'Liste', 'route' => ''], // À compléter
            ]
            ])

            {{-- Utilisateur --}}
            @include('base.components.sidebar.section', [
            'icon' => 'mdi mdi-file-document-outline',
            'title' => 'Utilisateur',
            'items' => [
            ['label' => 'Profil', 'route' => 'partenaire.profile'],
            ['label' => 'Modifier mes informations', 'route' => 'partenaire.profile.edit'],
            // ['label' => 'Changer mot de passe', 'route' => 'partenaire.change-password'],
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