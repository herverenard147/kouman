<?php
// Client data
$clients = [
    [
        'img' => '/images/client/09.jpg',
        'name' => 'Christopher',
        'time' => '10 Min',
        'message' => 'Hello',
        'status' => 'online',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative bg-gray-50 dark:bg-slate-800',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/01.jpg',
        'name' => 'Dr. Cristino',
        'time' => '20 Min',
        'message' => 'Hi, How are you?',
        'status' => 'offline',
        'unread' => 2,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-900 dark:text-white font-medium truncate',
    ],
    [
        'img' => '/images/client/03.jpg',
        'name' => 'Faye',
        'time' => '30 Min',
        'message' => 'Heyy',
        'status' => 'offline',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/04.jpg',
        'name' => 'Ronald',
        'time' => '2 Hours',
        'message' => 'Hey, How are you sir?',
        'status' => 'offline',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/11.jpg',
        'name' => 'Melissa',
        'time' => '3 Hours',
        'message' => 'Good Afternoon',
        'status' => 'online',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/12.jpg',
        'name' => 'Elsie',
        'time' => '10 Hours',
        'message' => 'Good Morning sir, how can i help you?',
        'status' => 'online',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/07.jpg',
        'name' => 'Jerry',
        'time' => '16 Hours',
        'message' => 'Please give me appointment',
        'status' => 'online',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/13.jpg',
        'name' => 'Louis',
        'time' => '1 Days',
        'message' => 'Hii',
        'status' => 'offline',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/06.jpg',
        'name' => 'Randall',
        'time' => '2 Days',
        'message' => 'Hello Sir',
        'status' => 'offline',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/10.jpg',
        'name' => 'Mary',
        'time' => '3 Days',
        'message' => 'How are you sir?',
        'status' => 'offline',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
    [
        'img' => '/images/client/08.jpg',
        'name' => 'Lester',
        'time' => '4 Days',
        'message' => 'Hello please give me answer.',
        'status' => 'online',
        'unread' => 0,
        'style' => 'flex items-center p-2 rounded-md relative hover:bg-gray-50 dark:hover:bg-slate-800 mt-1.5',
        'class' => 'text-slate-400 truncate',
    ],
];
?>
@foreach ($clients as $item)
    <a href="#" class="{{$item['style']}}">
        <div class="relative">
            <img src="{{ asset($item['img']) }}" class="size-11 rounded-full shadow dark:shadow-gray-700" alt="">
            @if ($item['status'] === 'online')
                <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-green-600 text-white text-[10px] font-bold rounded-full size-2 after:content-[''] after:absolute after:h-2 after:w-2 after:bg-green-600 after:top-0 after:end-0 after:rounded-full after:animate-ping"></span>
            @elseif ($item['unread'] >= 0)
                <span class="absolute top-0.5 start-0.5 flex items-center justify-center bg-red-600 text-white text-[10px] font-bold rounded-full size-2"></span>
            @endif
        </div>
        <div class="overflow-hidden flex-1 ms-2">
            <div class="flex justify-between">
                <h6 class="font-semibold"><?php echo $item['name']; ?></h6>
                <small class="text-slate-400"><?php echo $item['time']; ?></small>
            </div>
            <div class="flex justify-between">
                <span class="{{$item['class']}}"> {{$item['message']}}</span>
                @if ($item['unread'] > 0)
                    <span class="flex items-center justify-center bg-red-600/20 text-red-600 text-[10px] font-bold rounded-full w-5 max-h-5">{{$item['unread']}}</span>
                @endif
            </div>
        </div>
    </a>
@endforeach
