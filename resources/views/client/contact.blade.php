@php
    $page = 'light';
    $fpage = 'foot';
@endphp
@extends('client.base.style.base')

@section('navlink')
    @include('client.base.style.navbar-dark')
@endsection

@section('content')
    <!-- Google Map -->
    <div class="container-fluid relative mt-20">
        <div class="grid grid-cols-1">
            <div class="w-full leading-[0] border-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                    style="border:0" class="w-full h-[500px]" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <!-- Google Map -->

    <!-- Start Section-->
    <section class="relative lg:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">

                <!-- SVG Illustration -->
                <div class="lg:col-span-7 md:col-span-6">
                    <img src="{{ asset('client/assets/images/svg/contact.svg') }}" alt="Contact Illustration">
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:me-5">
                        <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-700 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>

                            <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                        <label for="name" class="font-medium">Your Name:</label>
                                        <input name="name" id="name" type="text" class="form-input mt-2"
                                            placeholder="Name :">
                                    </div>

                                    <div class="lg:col-span-6 mb-5">
                                        <label for="email" class="font-medium">Your Email:</label>
                                        <input name="email" id="email" type="email" class="form-input mt-2"
                                            placeholder="Email :">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                        <label for="subject" class="font-medium">Your Question:</label>
                                        <input name="subject" id="subject" class="form-input mt-2"
                                            placeholder="Subject :">
                                    </div>

                                    <div class="mb-5">
                                        <label for="comments" class="font-medium">Your Comment:</label>
                                        <textarea name="comments" id="comments" class="form-input mt-2 textarea" placeholder="Message :"></textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" name="send"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Contact cards -->
        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                @include('client.base.components.Contact.contact')
            </div>
        </div>
    </section>
    <!-- End Section -->
@endsection
