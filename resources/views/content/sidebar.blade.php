{{-- Vérifie d'abord si un partenaire est connecté --}}
@php
    $partenaire = Auth::guard('partenaire')->user();
@endphp

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

@if($partenaire && in_array($partenaire->type, ['residence', 'hotel', 'evenementiel']))
    @include('base.components.sidebar.section', [
        'icon' => 'mdi mdi-file-document-outline',
        // ...
    ])
@endif
