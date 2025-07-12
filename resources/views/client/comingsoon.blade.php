<?php
$base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets'; // Ensure this is the correct path

// Define the content for the navlink block
ob_start();
?>
<?php
$navlink_content = ob_get_clean(); // Capture the navlink content
ob_start();
?>

        <section class="md:h-screen py-36 flex items-center justify-center relative overflow-hidden zoom-image">
            <div class="absolute inset-0 image-wrap z-1 bg-[url('../../<?php echo $static_url; ?>/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
            <div class="container-fluid relative z-3">
                <div class="grid grid-cols-1">
                    <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                        <div class="text-center">
                            <a href="index.php"><img src="<?php echo $static_url; ?>/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                        </div>
                        <div class="title-heading text-center my-auto">
                            <h1 class="text-white mt-3 mb-6 md:text-5xl text-3xl font-bold">We Are Coming Soon...</h1>
                            <p class="text-white/70 text-lg max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>

                            <div id="countdown">
                                <ul class="count-down list-none inline-block text-white text-center mt-8 m-6">
                                    <li id="days" class="count-number inline-block m-2"></li>
                                    <li id="hours" class="count-number inline-block m-2"></li>
                                    <li id="mins" class="count-number inline-block m-2"></li>
                                    <li id="secs" class="count-number inline-block m-2"></li>
                                    <li id="end" class="h1"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script> Hously. Design & Develop with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section -->

<?php
$hero_content = ob_get_clean(); // Capture the hero content

// Include the base template
@include('client.Base.style.no-header');
