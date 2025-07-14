@include('client.Base.style.no-header')

@section('title', 'Reset Password - Hously')
@section('content')
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">

        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('../../Hously_Landing/assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="/index"><img src="/Hously_Landing/assets/images/logo-icon-64.png" class="mx-auto"
                            alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Reset Your Password</h5>
                    <div class="grid grid-cols-1">
                        <p class="text-slate-400 mb-6">Please enter your email address. You will receive a link to create a
                            new password via email.</p>
                        <form class="text-start">
                            <div class="grid grid-cols-1">
                                <div class="mb-4">
                                    <label class="font-medium" for="LoginEmail">Email Address:</label>
                                    <input id="LoginEmail" type="email" class="form-input mt-3"
                                        placeholder="name@example.com">
                                </div>

                                <div class="mb-4">
                                    <a href=""
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Send</a>
                                </div>

                                <div class="text-center">
                                    <span class="text-slate-400 me-2">Remember your password ? </span><a href="/auth-login"
                                        class="text-black dark:text-white font-bold">Sign in</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section -->
@endsection
