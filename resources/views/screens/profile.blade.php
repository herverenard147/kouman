
@extends('layout.base')

@section('title', 'Profil utilisateur')

@section('content')
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="grid grid-cols-1">
                <div class="profile-banner relative text-transparent rounded-md shadow overflow-hidden">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)">
                    <div class="relative shrink-0">
                        <img src="{{ asset('images/bg.jpg') }}" class="h-80 w-full object-cover" id="profile-banner" alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1">
                <div class="xl:col-span-3 lg:col-span-4 md:col-span-4 mx-6">
                    <div class="p-6 relative rounded-md shadow bg-white -mt-48">
                        <div class="profile-pic text-center mb-5">
                            <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                            <div>
                                <div class="relative size-24 mx-auto">
                                    <img src="{{asset("/images/client/07.jpg")}}" class="rounded-full shadow ring-4 ring-slate-50" id="profile-image" alt="">
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>

                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold">Calvin Carlo</h5>
                                    <p class="text-slate-400">calvin@hotmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100">
                            <h5 class="text-xl font-semibold mt-4">Personal Details :</h5>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <i data-feather="mail" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Email :</h6>
                                        <a href="" class="text-slate-400">calvin@hotmail.com</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="bookmark" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Skills :</h6>
                                        <a href="" class="text-slate-400">html</a>, <a href="" class="text-slate-400">css</a>, <a href="" class="text-slate-400">js</a>, <a href="" class="text-slate-400">mysql</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="italic" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Language :</h6>
                                        <a href="" class="text-slate-400">English</a>, <a href="" class="text-slate-400">Japanese</a>, <a href="" class="text-slate-400">Chinese</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="globe" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Website :</h6>
                                        <a href="" class="text-slate-400">www.cristina.com</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="gift" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Birthday :</h6>
                                        <p class="text-slate-400 mb-0">2nd March, 1996</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="map-pin" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Location :</h6>
                                        <a href="" class="text-slate-400">Beijing, China</a>
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <i data-feather="phone" class="fea icon-ex-md text-slate-400 me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="text-green-600 font-medium mb-0">Cell No :</h6>
                                        <a href="" class="text-slate-400">(+12) 1254-56-4896</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="p-6 relative rounded-md shadow bg-white">
                            <h5 class="text-xl font-semibold">Calvin Carlo</h5>

                            <p class="text-slate-400 mt-3">I have started my career as a trainee and prove my self and achieve all the milestone with good guidance and reach up to the project manager. In this journey, I understand all the procedure which make me a good developer, team leader, and a project manager.</p>
                        </div>

                        <div class="p-6 relative rounded-md shadow bg-white">
                            <h5 class="text-xl font-semibold">My Property :</h5>

                            <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">

                                <!-- properties2 code  -->
                                @include('base.Components.user-profile.properties2')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div><!--end container-->
@endsection
<?php
// $hero_content = ob_get_clean(); // Capture the hero content

// // Include the base template
// include "$base_dir/style/base.php";
?>
