@props(['icon', 'title', 'items'])

<li class="sidebar-dropdown">
    <a href="javascript:void(0)">
        <i class="{{ $icon }} me-2"></i>{{ $title }}
    </a>
    <div class="sidebar-submenu">
        <ul>
            @foreach ($items as $item)
                <li><a href="{{ route($item['route']) }}">{{ $item['label'] }}</a></li>
            @endforeach
        </ul>
    </div>
</li>
