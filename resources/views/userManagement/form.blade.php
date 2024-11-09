@extends('layout')

@section('navbar')
    <nav class="text-black text-2xl">
        <ul>
            @foreach ($menus as $menu)
                <li class="py-3">
                    <img src="{{ $menu->menu_icon }}" alt="" class="h-10 float-left">
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
@endsection

@section('content')
    {{-- Halaman Form Add User --}}
    <div class="pb-64">
        <form 
            @if (isset($user))
                action="{{ route('update.user', $user->user_id ?? $user->id) }}"
            @else
                action="{{ route('post.user') }}"
            @endif
            method="POST" class="">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <p class="text-3xl font-bold mb-5">
                Tambah Pengguna
            </p>
            <table>
                <tr>
                    <td><label for="" class="w-60 pb-3">Nama Lengkap</label></td>
                    <td class="w-3 pb-3">:</td>
                    <td class="w-80"><input type="text" id="name" name="name" class="form-control mb-3"
                        @if (isset($user))
                            value="{{ $user->user_fullname ?? $user->name }}"
                        @endif>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="pb-3">Email</label></td>
                    <td class="pb-3">:</td>
                    <td><input type="email" id="email" name="email" class="form-control mb-3"
                        @if (isset($user))
                            value="{{ $user->user_email ?? $user->email }}"
                        @endif>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="pb-3">Password</label></td>
                    <td class="pb-3">:</td>
                    <td><input type="password" id="password" name="password" class="form-control mb-3"></td>
                </tr>
                <tr>
                    <td><label for="" class="pb-3">Konfirmasi Password</label></td>
                    <td class="pb-3">:</td>
                    <td><input type="password" id="password-confirm" name="password-confirm" class="form-control mb-3"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-primary float-right" type="submit">Submit</button></td>
                </tr>
            </table>
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ session('success') }}'
                    })
                </script>
            @endif
        </form>
    </div>
@endsection