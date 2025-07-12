<?php
$benefits = [
    [
        'icon' => 'uil uil-estate', 
        'title' => 'Free Consultation', 
        'desc' => "If the distribution of letters and 'words' is random, the reader will not be distracted from making.", 
    ],
    [
        'icon' => 'uil uil-bag', 
        'title' => 'Buyer Rebate Programs', 
        'desc' => "If the distribution of letters and 'words' is random, the reader will not be distracted from making.", 
    ],
    [
        'icon' => 'uil uil-key-skeleton', 
        'title' => 'Save Money', 
        'desc' => "If the distribution of letters and 'words' is random, the reader will not be distracted from making.", 
    ]
];
?>

<?php foreach ($benefits as $item): ?>
<!-- Content -->
<div class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
    <div class="relative overflow-hidden text-transparent -m-3">
        <i data-feather="hexagon" class="size-32 fill-green-600/5 mx-auto"></i>
        <div class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
            <i class="<?php echo $item['icon']; ?>"></i>
        </div>
    </div>

    <div class="mt-6">
        <h5 class="text-xl font-medium"><?php echo $item['title']; ?></h5>
        <p class="text-slate-400 mt-3"><?php echo $item['desc']; ?></p>
    </div>
</div>
<!-- Content -->
<?php endforeach; ?>