<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{ route('client.index') }}"><img src="{{ asset('client/assets/images/logoG.ico') }}" alt="Afrique évasion"></a>
        </div>

        @php
            $partenaire = Auth::guard('partenaire')->user();
        @endphp

        <ul class="sidebar-menu border-t border-white/10" data-simplebar style="height: calc(100% - 70px);">
            {{-- Tableau de bord --}}
            <li>
                <a href="{{ route('partenaire.dashboard') }}">
                    <i class="mdi mdi-chart-bell-curve-cumulative me-2"></i>Tableau de bord
                </a>
            </li>

            {{-- Mes propriétés (commune à tous) --}}
            <li>
                <a href="{{ route('partenaire.hebergement') }}">
                    <i class="mdi mdi-home-city me-2"></i>Mes Propriétés
                </a>
            </li>

            {{-- Hebergement / Résidence --}}
            @if($partenaire && $partenaire->type === 'residence')
                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Hebergement',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.hebergement'],
                        ['label' => 'Liste', 'route' => 'partenaire.hebergement'],
                    ]
                ])
            @endif

            {{-- Chambre / Hotel --}}
            @if($partenaire && $partenaire->type === 'hotel')
                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Chambre',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.chambre'],
                        ['label' => 'Liste', 'route' => 'partenaire.chambre'],
                    ]
                ])
            @endif

            {{-- Événement et Excursion (Résidence, Hôtel, Événementiel) --}}
            @if($partenaire && in_array($partenaire->type, ['residence', 'hotel', 'evenementiel']))
                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Evenement',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.event'],
                        ['label' => 'Liste', 'route' => 'partenaire.event'],
                    ]
                ])

                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Excursion',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.excursion'],
                        ['label' => 'Liste', 'route' => 'partenaire.excursion'],
                    ]
                ])
            @endif

            {{-- Vol (Agence de voyage + Compagnie aérienne) --}}
            @if($partenaire && in_array($partenaire->type, ['agence_voyage', 'compagnie_aerienne']))
                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Vol',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.vol'],
                        // ['label' => 'Liste', 'route' => ''], // À compléter
                    ]
                ])
            @endif

            {{-- Excursion pour Agence de voyage --}}
            @if($partenaire && $partenaire->type === 'agence_voyage')
                @include('base.components.sidebar.section', [
                    'icon' => 'mdi mdi-file-document-outline',
                    'title' => 'Excursion',
                    'items' => [
                        ['label' => 'Ajouter', 'route' => 'partenaire.add.excursion'],
                        ['label' => 'Liste', 'route' => 'partenaire.excursion'],
                    ]
                ])
            @endif

            @include('base.components.sidebar.section', [
                'icon' => 'mdi mdi-file-document-outline',
                'title' => 'Utilisateur',
                'items' => [
                    ['label' => 'Profil', 'route' => 'partenaire.profile'],
                    ['label' => 'Modifier mes informations', 'route' => 'partenaire.profile.edit'],
                    // ['label' => 'Changer mot de passe', 'route' => 'partenaire.change-password'],
                ]
            ])

            {{-- Favoris --}}
            <li>
                <a href="{{ route('partenaire.favorite-hebergement') }}">
                    <i class="mdi mdi-home-heart me-2"></i>Favoris
                </a>
            </li>
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
