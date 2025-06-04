<?php
$pricings = [
    [
        'icon' => 'mdi mdi-tree-outline', 
        'title' => 'Basic',
        'price' => '19', 
        'btn' => 'Get Started', 
    ],
    [
        'icon' => 'mdi mdi-shield-star-outline', 
        'title' => 'Premium',
        'price' => '39', 
        'btn' => 'Get Started', 
    ],
    [
        'icon' => 'mdi mdi-rocket-launch-outline', 
        'title' => 'Business',
        'price' => '99', 
        'btn' => 'Get Started', 
    ]
];
?>

<?php foreach ($pricings as $item): ?>
<!-- Content -->
<div class="rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 hover:shadow-md dark:hover:shadow-gray-700 duration-500 ease-in-out">
    <div class="border-b dark:border-gray-800 p-6 text-center">
        <div class="size-24 bg-green-600/5 text-green-600 flex items-center justify-center text-3xl rounded-full mx-auto">
            <i class="<?php echo $item['icon']; ?>"></i>
        </div>

        <h3 class="text-2xl text-green-600 font-medium mt-4"><?php echo $item['title']; ?></h3>
    
        <div class="flex justify-center mt-4">
            <span class="text-xl">$</span>
            <span class="text-3xl font-semibold"><?php echo $item['price']; ?></span>
            <span class="text-xl self-end">/month</span>
        </div>
    </div>

    <div class="p-6">
        <h5>Pricing Features:</h5>

        <ul class="list-none">
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Full Access</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Source Files</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Free Appointments</li>
            <li class="text-slate-400 mt-2"><span class="text-green-600 text-lg me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Enhanced Security</li>
        </ul>
        
        <a href="" class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-md w-full mt-4"><?php echo $item['btn']; ?></a>
    </div>
</div>
<!-- Content -->
<?php endforeach; ?>