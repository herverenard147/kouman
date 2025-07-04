@extends('layout.base')
@section('title', 'Starter Page')
@section('content')
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Starter Page</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600"><a href="{{route('partenaire.dashboard')}}">Kouman</a></li>
                    <li class="inline-block text-base text-slate-950 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Starter Page</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div class="rounded-md shadow p-6 bg-white">
                    <p class="text-slate-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, aliquid soluta. Voluptas neque adipisci fuga magnam nulla exercitationem corrupti ducimus itaque soluta earum! Fugiat, animi id sit ad magnam facilis.</p>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div><!--end container-->
@endsection
