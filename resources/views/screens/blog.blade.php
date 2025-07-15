
@extends('layout.base')
@section('title', 'Blogs')
@section('content')

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <div>
                    <h5 class="text-lg font-semibold">Blogs</h5>

                    <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                        <li class="inline-block capitalize text-[16px] font-medium duration-500 hover:text-green-600"><a href="{{route('partenaire.dashboard')}}">Kouman</a></li>
                        <li class="inline-block text-base text-slate-950 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                        <li class="inline-block capitalize text-[16px] font-medium text-green-600" aria-current="page">Blogs</li>
                    </ul>
                </div>

                <div>
                    <a href="javascript:void(0)" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-slate-800/5 hover:bg-slate-800/10 border border-slate-100/5 text-slate-900 rounded-full" data-modal-toggle="addblog" title="Add New"><i data-feather="plus" class="size-4"></i></a>
                </div>
            </div>

            <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-6">

                <!-- blogs code  -->

                @include('base.components.Blog.blogs')

            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                <div class="md:col-span-12 text-center">
                    <nav>
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white hover:text-white shadow-sm hover:border-green-600 hover:bg-green-600">
                                    <i class="mdi mdi-chevron-left text-[20px]"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white shadow-sm hover:border-green-600 hover:bg-green-600">1</a>
                            </li>
                            <li>
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white shadow-sm hover:border-green-600 hover:bg-green-600">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="z-10 size-10 inline-flex justify-center items-center mx-1 rounded-full text-white bg-green-600 shadow-sm">3</a>
                            </li>
                            <li>
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 hover:text-white bg-white shadow-sm hover:border-green-600 hover:bg-green-600">4</a>
                            </li>
                            <li>
                                <a href="#" class="size-10 inline-flex justify-center items-center mx-1 rounded-full text-slate-400 bg-white hover:text-white shadow-sm hover:border-green-600 hover:bg-green-600">
                                    <i class="mdi mdi-chevron-right text-[20px]"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div><!--end grid-->
            <!-- End Content -->
        </div>
    </div><!--end container-->


    <!-- Modal -->
    <div id="addblog" tabindex="10" class="fixed z-50 hidden overflow-hidden inset-0 m-auto">
        <div class="relative w-full h-auto max-w-lg p-4">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-4 border-b border-gray-100">
                    <h5 class="text-xl font-semibold">Add blog or news</h5>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ms-auto inline-flex items-center" data-modal-toggle="addblog">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="p-4">
                    <div>
                        <p class="font-semibold mb-4">Upload your blog image here, Please click "Upload Image" Button.</p>
                        <div class="preview-box flex justify-center rounded-md shadow overflow-hidden bg-gray-50 text-slate-400 p-2 text-center small w-auto max-h-60">Supports JPG, PNG and MP4 videos. Max file size : 10MB.</div>
                        <input type="file" id="input-file" name="input-file" accept="image/*" onchange={handleChange()} hidden>
                        <label class="btn-upload py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer" for="input-file">Upload Image</label>
                    </div>

                    <form class="mt-4">
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12">
                                <label class="font-semibold">Blog Title <span class="text-red-600">*</span></label>
                                <input name="name" id="name" type="text" class="form-input w-full py-2 px-3 h-10 bg-transparent rounded outline-none border border-gray-200 focus:border-green-600 focus:ring-0 mt-2" placeholder="Title :">
                            </div><!--end col-->

                            <div class="col-span-12">
                                <label class="font-semibold"> Description : </label>
                                <textarea name="comments" id="comments" class="form-input w-full py-2 px-3 h-24 bg-transparent rounded outline-none border border-gray-200 focus:border-green-600 focus:ring-0 mt-2" placeholder="Description :"></textarea>
                            </div><!--end col-->

                            <div class="col-span-12">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md">Create Blog</button>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <script>
        const handleChange = () => {
            const fileUploader = document.querySelector('#input-file');
            const getFile = fileUploader.files
            if (getFile.length !== 0) {
                const uploadedFile = getFile[0];
                readFile(uploadedFile);
            }
        }

        const readFile = (uploadedFile) => {
            if (uploadedFile) {
                const reader = new FileReader();
                reader.onload = () => {
                const parent = document.querySelector('.preview-box');
                parent.innerHTML = `<img class="preview-content" src=${reader.result} />`;
                };

                reader.readAsDataURL(uploadedFile);
            }
        };
    </script>
    <!-- JAVASCRIPTS -->
@endsection
