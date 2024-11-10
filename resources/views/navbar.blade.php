<nav class="text-black text-2xl">
    <ul>
        @foreach ($menus as $menu)
            <li class="py-3">
                <img src="http://localhost:8000/{{ $menu->menu_icon }}" alt="" class="h-10 float-left">
                @if ( $menu->menu_name == 'Logout' )
                    <form action="{{ route('post.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-montserrat text-black">
                            {{ $menu->menu_name }}
                        </button>
                    </form>
                @else
                    <a href="{{ $menu->menu_link }}" class="text-decoration-none font-montserrat text-black">{{ $menu->menu_name }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>