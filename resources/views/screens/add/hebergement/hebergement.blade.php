@extends('layout.base')

@section('title', 'Mes Propriétés')

@section('content')
<div class="container-fluid relative px-3 bg-white dark:bg-slate-900 min-h-screen">

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Tous vos elements</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600 dark:hover:text-green-500"><a href="{{route('index')}}" class="text-gray-600 dark:text-gray-300">Afrique évasion</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-gray-400 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600 dark:text-green-500" aria-current="page">Properties</li>
                </ul>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-6">
                @include('screens.add.Hebergement.hebergement-list', ['hebergements' => $hebergements])
            </div>

            {{-- The original pagination condition ! $hebergements seems incorrect.
                 It's more logical to show pagination if hebergements exist and are paginated.
                 Assuming $hebergements is a paginator instance from Laravel. --}}
            @if (isset($hebergements) && $hebergements->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                    <div class="md:col-span-12 text-center">
                        <nav>
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="{{ $hebergements->previousPageUrl() }}" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 dark:text-gray-300 bg-white dark:bg-slate-800 hover:text-white dark:hover:text-white shadow-sm hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-700">
                                        <i class="mdi mdi-chevron-left text-[20px]"></i>
                                    </a>
                                </li>
                                @foreach ($hebergements->getUrlRange(1, $hebergements->lastPage()) as $page => $url)
                                    <li>
                                        <a href="{{ $url }}" class="size-10 inline-flex justify-center items-center mx-1 rounded-full @if ($page == $hebergements->currentPage()) text-white bg-green-600 shadow-sm dark:bg-green-700 @else text-slate-400 dark:text-gray-300 hover:text-white dark:hover:text-white bg-white dark:bg-slate-800 shadow-sm hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-700 @endif">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ $hebergements->nextPageUrl() }}" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 dark:text-gray-300 bg-white dark:bg-slate-800 hover:text-white dark:hover:text-white shadow-sm hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-700">
                                        <i class="mdi mdi-chevron-right text-[20px]"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
