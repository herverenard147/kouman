<?php
// $base_dir = __DIR__ . '/Base';
$static_url = '/Hously_Landing/assets';

// Define the content for the navlink block
ob_start();
?>

<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>Hously -  PHP Real Estate Landing & Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta content="Real Estate Website Landing Page" name="description" />
        <meta content="Real Estate, buy, sell, Rent, tailwind Css" name="keywords" />
        <meta name="author" content="Shreethemes" />
        <meta name="website" content="https://shreethemes.in" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="version" content="2.3.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- favicon -->
        <link rel="shortcut icon" href="<?php echo $static_url; ?>/images/favicon.ico" />

        <!-- Css -->
        <link href="<?php echo $static_url; ?>/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
        <link href="<?php echo $static_url; ?>/libs/tobii/css/tobii.min.css" rel="stylesheet">
        <link href="<?php echo $static_url; ?>/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
        <link href="<?php echo $static_url; ?>/libs/swiper/css/swiper.min.css" rel="stylesheet">
        <!-- Main Css -->
        <link href="<?php echo $static_url; ?>/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo $static_url; ?>/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo $static_url; ?>/css/tailwind.css" />
        <link rel="stylesheet" href="<?php echo $static_url; ?>/css/output.css" />

    </head>
    
    <body class="dark:bg-slate-900">
        
        <script src="https://cdn.tailwindcss.com"></script>

        <script>
        tailwind.config = {
            darkMode: 'class', // or 'media' for system-based dark mode
            // important: true,
        }
        </script>

        <?php
        // Define an associative array for mapping page values to navbar files
        $navbarFiles = [
            'dark' => 'navbar-dark.php',
            'light' => 'navbar-light.php',
            'tagline-dark' => 'navbar-tagline-dark.php',
            'center' => 'navbar-center.php',
            
        ];

        // Check if the page exists in the array, and include the corresponding file
        if (array_key_exists($page, $navbarFiles)) {
            include $navbarFiles[$page];
        } else {
            include 'no-header.php'; // Default navbar
        }
        ?>

        <!-- Main Content -->
        <main>
            <?php echo $hero_content ?? '<!-- Default hero content here -->'; ?>
        </main>

        <?php
        // Define an associative array for mapping fpage values to footer files
        $footerFiles = [
            'foot' => 'footer.php',
            'foot1' => 'footer1.php',
            
        ];

        // Check if the fpage exists in the array, and include the corresponding file
        if (array_key_exists($fpage, $footerFiles)) {
            include $footerFiles[$fpage];
        } else {
            include 'footer2.php'; // Default footer
        }
        ?>

        <!-- Switcher -->
        <div class="fixed top-1/4 -left-2 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
                </label>
            </span>
        </div>
        <!-- Switcher -->

        <!-- LTR & RTL Mode Code -->
        <div class="fixed top-[40%] -left-3 z-50">
            <a href="" id="switchRtl">
                <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden" >LTR</span>
                <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
            </a>
        </div>
        <!-- LTR & RTL Mode Code -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-green-600 text-white justify-center items-center"><i class="uil uil-arrow-up"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
        <script src="<?php echo $static_url; ?>/libs/tiny-slider/min/tiny-slider.js"></script>
        <script src="<?php echo $static_url; ?>/libs/gumshoejs/gumshoe.polyfills.min.js"></script>
        <script src="<?php echo $static_url; ?>/libs/tobii/js/tobii.min.js"></script>
        <script src="<?php echo $static_url; ?>/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="<?php echo $static_url; ?>/libs/swiper/js/swiper.min.js"></script>
        <script src="<?php echo $static_url; ?>/js/easy_background.js"></script>
        <script src="<?php echo $static_url; ?>/libs/feather-icons/feather.min.js"></script>
        <script src="<?php echo $static_url; ?>/js/plugins.init.js"></script>
        <script src="<?php echo $static_url; ?>/js/app.js"></script>
        <!-- JAVASCRIPTS -->

        
    </body>
</html>