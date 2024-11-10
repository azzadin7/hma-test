@extends('layout')

@section('content')
    {{-- Halaman Form Add User --}}
    <div class="pb-32">
        <p class="text-3xl font-bold mb-5">
            Theme Configuration
        </p>
        <table>
            <tr>
                <td class="pb-10"><label for="" class="w-40 font-bold">Logo</label></td>
                <td class="pb-10">
                    <img src="./Elfaita Project Logo (Mix & Landscape).png" alt="" class="h-10">
                </td>
                <td>
                    {{-- <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="logo">
                        <button type="submit">Upload</button>
                    </form> --}}
                </td>
                <td></td>
            </tr>
            <tr class="font-bold">
                <td>List of Menu</td>
                <td class="w-40">Menu Name</td>
                <td class="w-40">Menu Icon</td>
                <td class="w-40">Menu Order</td>
            </tr>
            @foreach ($menus as $menu)
                <tr>
                    <td></td>
                    <td>{{ $menu->menu_name }}</td>
                    <td><img src="{{ $menu->menu_icon }}" alt="" class="h-10"></td>
                    <td>{{ $menu->menu_order }}</td>
                    <td>
                        <button>
                            Change Icon
                        </button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td><label for="" class="pb-3 font-bold">Color Theme</label></td>
                <td class="pb-3">:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button class="btn btn-primary float-right" type="submit">Submit</button></td>
            </tr>
        </table>
    </div>
@endsection