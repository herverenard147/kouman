{{-- listing-grid.blade.php : affiche les cards à partir de $items --}}

@forelse ($items as $item)
<div class="flex flex-col h-full rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl overflow-hidden transition">
    {{-- Image ratio fixe pour des cartes alignées --}}
    <div class="relative aspect-[16/9]">
        <img src="{{ $item['img'] ?? '' }}" alt="{{ $item['title'] ?? '' }}"
            class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute top-4 right-4">
            <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/90 shadow">
                <i class="mdi mdi-heart text-[20px] text-slate-700"></i>
            </span>
        </div>
    </div>

    <div class="p-6 flex flex-col flex-1">
        <div class="pb-2">
            @if(!empty($item['categorie']))
            <span class="text-xs px-2 py-1 rounded bg-green-50 text-green-700 border border-green-100">
                {{ ucfirst($item['categorie']) }}
            </span>
            @endif
        </div>

        <div class="pb-4">
            <a href="{{ route('client.property.detail.two', ['id' => $item['id'] ?? 0]) }}"
                class="text-base sm:text-lg font-medium hover:text-green-600 transition-colors">
                {{ $item['title'] ?? '' }}
            </a>
        </div>

        {{-- ====================== Hébergements ====================== --}}
        @if(($item['categorie'] ?? '') === 'hebergement')
        <ul class="py-4 border-y border-slate-100 dark:border-slate-800 flex items-center gap-4 text-sm">
            <li class="flex items-center gap-2">
                <i class="uil uil-bed-double text-xl text-green-600"></i>
                <span>{{ $item['beds'] ?? '-' }}</span>
            </li>
            <li class="flex items-center gap-2">
                <i class="uil uil-bath text-xl text-green-600"></i>
                <span>{{ $item['baths'] ?? '-' }}</span>
            </li>
            <li class="flex items-center gap-2">
                <i class="uil uil-users-alt text-xl text-green-600"></i>
                <span>{{ $item['capaciteMax'] ?? '-' }} <span class="text-slate-500">pers.</span></span>
            </li>
        </ul>

        @if(!empty($item['noteMoyenne']))
        <div class="mt-2 flex items-center gap-1 text-yellow-500">
            <i class="uil uil-star text-xl"></i>
            <span class="font-semibold">{{ $item['noteMoyenne'] }}/5</span>
        </div>
        @endif
        @endif

        {{-- ====================== Vols ====================== --}}
        @if(($item['categorie'] ?? '') === 'vol')
        <ul class="py-4 border-y border-slate-100 dark:border-slate-800 flex flex-wrap items-center gap-4 text-sm">
            <li class="flex items-center gap-2">
                <i class="uil uil-plane-departure text-xl text-green-600"></i>
                <span>{{ $item['depart'] ?? '-' }} <span class="text-slate-400">→</span> {{ $item['arrivee'] ?? '-' }}</span>
            </li>
            <li class="flex items-center gap-2">
                <i class="uil uil-building text-xl text-green-600"></i>
                <span>{{ $item['compagnie'] ?? '-' }} @if(!empty($item['numeroVol'])) • {{ $item['numeroVol'] }} @endif</span>
            </li>
            @if(!empty($item['dateDepart']) || !empty($item['dateArrivee']))
            <li class="flex items-center gap-2">
                <i class="uil uil-schedule text-xl text-green-600"></i>
                <span>
                    {{ $item['dateDepart'] ?? '' }}
                    @if(!empty($item['dateArrivee'])) <span class="text-slate-400">→</span> {{ $item['dateArrivee'] }} @endif
                </span>
            </li>
            @endif
        </ul>
        @endif

        {{-- ====================== Excursions ====================== --}}
        @if(($item['categorie'] ?? '') === 'excursion')
        <ul class="py-4 border-y border-slate-100 dark:border-slate-800 flex flex-col gap-2 text-sm">
            {{-- Durée en entier + libellé heure/heures --}}
            @php $d = $item['duree'] ?? null; @endphp
            <li class="flex items-center gap-2">
                <i class="uil uil-clock text-xl text-green-600"></i>
                <span>
                    @if($d !== null)
                    {{ $d }} {{ $d > 1 ? 'heures' : 'heure' }}
                    @else
                    -
                    @endif
                </span>
            </li>

            {{-- Capacité --}}
            @if(!empty($item['capaciteMax']))
            <li class="flex items-center gap-2">
                <i class="uil uil-users-alt text-xl text-green-600"></i>
                <span>{{ $item['capaciteMax'] }} <span class="text-slate-500">pers.</span></span>
            </li>
            @endif

            {{-- Âge minimum --}}
            @if(!empty($item['ageMinimum']))
            <li class="flex items-center gap-2">
                <i class="uil uil-user text-xl text-green-600"></i>
                <span>Âge min. : {{ $item['ageMinimum'] }} ans</span>
            </li>
            @endif

            {{-- Itinéraire (tronqué pour éviter les textes trop longs) --}}
            @if(!empty($item['itineraire']))
            @php
            $itin = strip_tags($item['itineraire']);
            $itinShort = mb_strlen($itin) > 100 ? mb_substr($itin, 0, 100).'…' : $itin;
            @endphp
            <li class="flex items-center gap-2">
                <i class="uil uil-map-marker text-xl text-green-600"></i>
                <span title="{{ $itin }}">{{ $itinShort }}</span>
            </li>
            @endif
        </ul>
        @endif


        {{-- ====================== Événements ====================== --}}
        @if(($item['categorie'] ?? '') === 'evenement')
        <ul class="py-4 border-y border-slate-100 dark:border-slate-800 flex items-center gap-4 text-sm">
            <li class="flex items-center gap-2">
                <i class="uil uil-clock text-xl text-green-600"></i>
                <span>{{ $item['duree'] ?? '-' }} heure(s)</span>
            </li>
            @if(!empty($item['capaciteMax']))
            <li class="flex items-center gap-2">
                <i class="uil uil-users-alt text-xl text-green-600"></i>
                <span>{{ $item['capaciteMax'] }} <span class="text-slate-500">pers.</span></span>
            </li>
            @endif
            @if(!empty($item['statut']))
            <li class="flex items-center gap-2">
                <i class="uil uil-check-circle text-xl text-green-600"></i>
                <span class="capitalize">{{ $item['statut'] }}</span>
            </li>
            @endif
        </ul>
        @endif

        <div class="mt-auto pt-4 flex items-center justify-between">
            <div>
                <span class="text-slate-400 text-sm">Prix</span>
                <p class="text-lg font-semibold leading-tight">{{ $item['price'] ?? '' }}</p>
            </div>

            <form action="{{ route('client.cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item['id'] ?? '' }}">
                <input type="hidden" name="name" value="{{ $item['title'] ?? '' }}">
                <input type="hidden" name="price" value="{{ isset($item['price_num']) ? $item['price_num'] : (isset($item['price']) ? preg_replace('/\D+/', '', $item['price']) : '') }}">
                <input type="hidden" name="image" value="{{ $item['img'] ?? '' }}">
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 rounded bg-green-600 hover:bg-green-700 text-white text-sm shadow">
                    Ajouter au panier
                </button>
            </form>
        </div>
    </div>
</div>
@empty
<div class="col-span-2 p-6 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-600">
    Aucun résultat ne correspond à vos filtres.
</div>
@endforelse