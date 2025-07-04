<?php
$reviews = [
    [
        'img' => '/images/client/01.jpg',
        'name' => 'Thomas Israel',
        'title' => "Student",
        'desc' => "I didn't know a thing about icon design until I read this book. Now I can create any icon I need in no time. Great resource!",
    ],
    [
        'img' => '/images/client/05.jpg',
        'name' => 'Barbara McIntosh',
        'title' => "Student",
        'desc' => "There are so many things I had to do with my old software that I just don't do at all with Kouman. Suspicious but I can't say I don't love it.",
    ],
    [
        'img' => '/images/client/02.jpg',
        'name' => 'Carl Oliver',
        'title' => "Student",
        'desc' => "The best part about Koumanis every time I pay my employees, my bank balance doesn't go down like it used to. Looking forward to spending this extra cash when I figure out why my card is being declined.",
    ],
    [
        'img' => '/images/client/04.jpg',
        'name' => 'Jill Webb',
        'title' => "Student",
        'desc' => "I'm trying to get a hold of someone in support, I'm in a lot of trouble right now and they are saying it has something to do with my books. Please get back to me right away.",
    ],
    [
        'img' => '/images/client/03.jpg',
        'name' => 'Barbara McIntosh',
        'title' => "Student",
        'desc' => "I used to have to remit tax to the EU and with KoumanI somehow don't have to do that anymore. Nervous to travel there now though.",
    ],
    [
        'img' => '/images/client/06.jpg',
        'name' => 'Janisha Doll',
        'title' => "Student",
        'desc' => "This is the fourth email I've sent to your support team. I am literally being held in jail for tax fraud. Please answer your damn emails, this is important.",
    ],
    [
        'img' => '/images/client/01.jpg',
        'name' => 'Thomas Israel',
        'title' => "Student",
        'desc' => "I didn't know a thing about icon design until I read this book. Now I can create any icon I need in no time. Great resource!",
    ],
    [
        'img' => '/images/client/05.jpg',
        'name' => 'Barbara McIntosh',
        'title' => "Student",
        'desc' => "There are so many things I had to do with my old software that I just don't do at all with Kouman. Suspicious but I can't say I don't love it.",
    ],
    [
        'img' => '/images/client/02.jpg',
        'name' => 'Carl Oliver',
        'title' => "Student",
        'desc' => "The best part about Koumanis every time I pay my employees, my bank balance doesn't go down like it used to. Looking forward to spending this extra cash when I figure out why my card is being declined.",
    ],
    [
        'img' => '/images/client/04.jpg',
        'name' => 'Jill Webb',
        'title' => "Student",
        'desc' => "I'm trying to get a hold of someone in support, I'm in a lot of trouble right now and they are saying it has something to do with my books. Please get back to me right away.",
    ],
    [
        'img' => '/images/client/03.jpg',
        'name' => 'Barbara McIntosh',
        'title' => "Student",
        'desc' => "I used to have to remit tax to the EU and with KoumanI somehow don't have to do that anymore. Nervous to travel there now though.",
    ],
    [
        'img' => '/images/client/06.jpg',
        'name' => 'Janisha Doll',
        'title' => "Student",
        'desc' => "This is the fourth email I've sent to your support team. I am literally being held in jail for tax fraud. Please answer your damn emails, this is important.",
    ],
    [
        'img' => '/images/client/01.jpg',
        'name' => 'Thomas Israel',
        'title' => "Student",
        'desc' => "I didn't know a thing about icon design until I read this book. Now I can create any icon I need in no time. Great resource!",
    ],
    [
        'img' => '/images/client/05.jpg',
        'name' => 'Barbara McIntosh',
        'title' => "Student",
        'desc' => "There are so many things I had to do with my old software that I just don't do at all with Kouman. Suspicious but I can't say I don't love it.",
    ],
    [
        'img' => '/images/client/02.jpg',
        'name' => 'Carl Oliver',
        'title' => "Student",
        'desc' => "The best part about Koumanis every time I pay my employees, my bank balance doesn't go down like it used to. Looking forward to spending this extra cash when I figure out why my card is being declined.",
    ]
];
?>

<?php foreach ($reviews as $item): ?>
<div class="xl:w-1/4 lg:w-1/3 md:w-1/2 p-3 picture-item">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center pb-6 border-b border-gray-100">
            <img src="{{ asset($item['img']) }}" class="size-16 rounded-full shadow" alt="">

            <div class="ps-4">
                <a href="" class="text-lg hover:text-green-600 duration-500 ease-in-out"><?php echo $item['name']; ?></a>
                <p class="text-slate-400"><?php echo $item['title']; ?></p>
            </div>
        </div>

        <div class="mt-6">
            <p class="text-slate-400"><?php echo $item['desc']; ?></p>
            <ul class="list-none mb-0 text-amber-400 mt-2">
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
                <li class="inline"><i class="mdi mdi-star"></i></li>
            </ul>
        </div>
    </div>
</div>
<?php endforeach; ?>
