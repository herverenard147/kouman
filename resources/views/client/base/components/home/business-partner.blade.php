@php
    $business = [
        [
            'img' => '/images/client/amazon.svg',
        ],
        [
            'img' => '/images/client/google.svg',
        ],
        [
            'img' => '/images/client/lenovo.svg',
        ],
        [
            'img' => '/images/client/paypal.svg',
        ],
        [
            'img' => '/images/client/shopify.svg',
        ],
        [
            'img' => '/images/client/spotify.svg',
        ],
    ];
@endphp

@foreach ($business as $item)
    <div class="mx-auto py-4">
        <img src="{{ asset('client/assets/' . $item['img']) }}" class="h-6" alt="">
    </div>
@endforeach
