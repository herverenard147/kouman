{{-- listing-grid.blade.php : liste de cards à partir de $items (grille ou slider) --}}

@if(!empty($asSlides))
{{-- MODE SLIDER : chaque enfant direct = 1 slide --}}
@php
$collection = $items instanceof \Illuminate\Pagination\LengthAwarePaginator
? $items->getCollection()
: collect($items);

// Déduplique par categorie|id pour éviter tout doublon visuel
$itemsUnique = $collection->unique(function ($i) {
$cat = is_array($i) ? ($i['categorie'] ?? '') : ($i->categorie ?? '');
$pid = is_array($i) ? ($i['id'] ?? '') : ($i->id ?? '');
return $cat.'|'.$pid;
})->values();
@endphp

@forelse ($itemsUnique as $item)
<div class="px-2"> {{-- marge latérale entre slides --}}
    @include('client.base.components.listing._card', ['item' => $item])
</div>
@empty
<div class="px-2">
    <p class="text-center text-slate-500">Aucune offre disponible.</p>
</div>
@endforelse

@else
{{-- MODE GRILLE : responsive, cartes plus larges et aérées --}}
<div class="mx-auto max-w-screen-2xl px-4">
  {{-- 1 col par défaut (mobile), 2 cols dès sm, avec !important pour passer devant les styles bloquants --}}
  <div class="grid !gap-8 justify-center
              ![grid-template-columns:repeat(1,minmax(0,1fr))]
              sm:![grid-template-columns:repeat(2,minmax(350px,1fr))]">
    @forelse ($items as $item)
      {{-- Sur mobile, on centre chaque carte et on limite sa largeur pour un rendu propre --}}
      <div class="h-full">
        <div class="w-full max-w-[520px] mx-auto sm:max-w-none">
          @include('client.base.components.listing._card', ['item' => $item])
        </div>
      </div>
    @empty
      <div class="col-span-full p-6 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-600">
        Aucun résultat ne correspond à vos filtres.
      </div>
    @endforelse
  </div>
</div>


@endif