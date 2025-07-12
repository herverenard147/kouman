<?php
$tabs = [
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white hover:text-green-600 transition-all duration-500 ease-in-out', 
        'id' => 'letter-tab', 
        'target' => "#letter", 
        'controls' => "letter", 
        'selected' => "true", 
        'title' => "Pre Approval Letter", 
    ],
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white mt-3 transition-all duration-500 ease-in-out', 
        'id' => 'schedule-tab', 
        'target' => "#schedule", 
        'controls' => "schedule", 
        'selected' => "false", 
        'title' => "Schedule a Showing", 
    ],
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white mt-3 transition-all duration-500 ease-in-out', 
        'id' => 'offer-tab', 
        'target' => "#offer", 
        'controls' => "offer", 
        'selected' => "false", 
        'title' => "Submit an Offer", 
    ],
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white mt-3 transition-all duration-500 ease-in-out', 
        'id' => 'inspection-tab', 
        'target' => "#inspection", 
        'controls' => "inspection", 
        'selected' => "false", 
        'title' => "Property Inspection", 
    ],
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white mt-3 transition-all duration-500 ease-in-out', 
        'id' => 'appraisal-tab', 
        'target' => "#appraisal", 
        'controls' => "appraisal", 
        'selected' => "false", 
        'title' => "Appraisal", 
    ],
    [
        'style' => 'px-4 py-2 text-base font-medium rounded-md w-full text-white mt-3 transition-all duration-500 ease-in-out', 
        'id' => 'closing-tab', 
        'target' => "#closing", 
        'controls' => "closing", 
        'selected' => "false", 
        'title' => "Closing Deal", 
    ]
];

$tabdatas = [
    [
        'style' => '', 
        'id' => 'letter', 
        'labelledby' => "letter-tab", 
        'img' => "/images/svg/Agent_Monochromatic.svg", 
        'title' => "Pre Approval Letter", 
        'desc' => "Most buyers think the first step is finding their dream house, but the truth is finding the funding is the first step. Hously streamlines the Loan Pre-Approval process with our ecosystem of Premier Partners or simply upload your own Pre-Approval letter.", 
    ],
    [
        'style' => 'hidden', 
        'id' => 'schedule', 
        'labelledby' => "schedule-tab", 
        'img' => "/images/svg/presentation_Flatline.svg", 
        'title' => "Schedule a Showing", 
        'desc' => "Hously allows a buyer to schedule an instant showing and gain a private viewing without the need for multiple parties to be involved. You pick the time that works for you!", 
    ],
    [
        'style' => 'hidden', 
        'id' => 'offer', 
        'labelledby' => "offer-tab", 
        'img' => "/images/svg/session_Flatline.svg", 
        'title' => "Submit an Offer", 
        'desc' => "Hously walks a buyer through the purchase agreement process making the paperwork appear effortless. With our custom workflows and progress analytics, you will always know where your purchase stands. No more phone tag and unreturned emails!", 
    ],
    [
        'style' => 'hidden', 
        'id' => 'inspection', 
        'labelledby' => "inspection-tab", 
        'img' => "/images/svg/Startup_Flatline.svg", 
        'title' => "Property Inspection", 
        'desc' => "No one wants to buy a lemon. Book an inspection with a licensed inspector, then submit the repair requests all via the Hously platform.", 
    ],
    [
        'style' => 'hidden', 
        'id' => 'appraisal', 
        'labelledby' => "appraisal-tab", 
        'img' => "/images/svg/team_Flatline.svg", 
        'title' => "Appraisal", 
        'desc' => "Hously monitors the appraisal process ensuring the home you are purchasing meets or exceeds the price you are paying.", 
    ],
    [
        'style' => 'hidden', 
        'id' => 'closing', 
        'labelledby' => "closing-tab", 
        'img' => "/images/svg/Team_meeting_Two.svg", 
        'title' => "Closing Deal", 
        'desc' => "Finally the closing packet is sent to the Title office, and the day has come… You have Hously the home of your dreams!", 
    ]
];
?>

<div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
    <div class="lg:col-span-4 md:col-span-5">
        <div class="sticky top-20">
            <ul class="flex-column text-center p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            
            <?php foreach ($tabs as $item): ?>
                <li role="presentation">
                    <button class="<?php echo $item['style']; ?>" id="<?php echo $item['id']; ?>" data-tabs-target="<?php echo $item['target']; ?>" type="button" role="tab" aria-controls="<?php echo $item['controls']; ?>" aria-selected="<?php echo $item['selected']; ?>"><?php echo $item['title']; ?></button>
                </li>
            <?php endforeach; ?>

            </ul>
        </div>
    </div>

    <div class="lg:col-span-8 md:col-span-7">
        <div id="myTabContent">

        <?php foreach ($tabdatas as $item): ?>
            <div class="<?php echo $item['style']; ?>" id="<?php echo $item['id']; ?>" role="tabpanel" aria-labelledby="<?php echo $item['labelledby']; ?>">
                <img src="<?php echo $static_url, $item['img']; ?>" alt="">
                <div class="mt-6">
                    <h5 class="font-medium text-xl"><?php echo $item['title']; ?></h5>
                    <p class="text-slate-400 mt-3"><?php echo $item['desc']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
            
        </div>
    </div>
</div><!--end grid-->