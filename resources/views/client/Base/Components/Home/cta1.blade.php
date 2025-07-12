<?php
$ctas = [
    [
        'number' => '1010', 
        'target' => '1548', 
        'symbol' => '+', 
        'title' => 'Properties Sell', 
    ],
    [
        'number' => '2', 
        'target' => '25', 
        'symbol' => '+', 
        'title' => 'Award Gained', 
    ],
    [
        'number' => '0', 
        'target' => '9', 
        'symbol' => '+', 
        'title' => 'Years Experience', 
    ]
];
?>

<?php foreach ($ctas as $item): ?>
<div class="counter-box text-center">
    <h1 class="lg:text-5xl text-4xl font-semibold mb-2 text-slate-400 dark:text-white"><span class="counter-value" data-target="<?php echo $item['target']; ?>"><?php echo $item['number']; ?></span><?php echo $item['symbol']; ?></h1>
    <h5 class="counter-head text-lg font-medium"><?php echo $item['title']; ?></h5>
</div><!--end counter box-->
<?php endforeach; ?>
