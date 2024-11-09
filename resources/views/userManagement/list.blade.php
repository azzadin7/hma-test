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
    {{-- Halaman User List --}}
    <div class="pb-96">
        <div class="grid grid-cols-2">
            <a href="/adduser" class="btn btn-primary w-fit col-span-1">
                <span class="font-bold mr-2">+</span>
                Tambah
            </a>
            <div class="col-span-1 right">
                <input type="search" name="" id="" class="form-control">
            </div>
        </div>
        <table class="table table-bordered mt-3">
            <thead class="h-10 font-bold">
                <td class="min-w-10">No</td>
                <td class="min-w-72">Nama Pengguna</td>
                <td class="min-w-60">Email</td>
                <td class="w-60">Aksi</td>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? $user->user_fullname }}</td>
                    <td>{{ $user->email ?? $user->user_email }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-warning mb-2" href="/edituser/{{ $user->id ?? $user->user_id }}">Edit</a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('delete.user', $user->id ?? $user->user_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-danger" onclick="confirmDelete({{ $user->id ?? $user->user_id }})">Delete</a>
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection