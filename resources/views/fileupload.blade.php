@extends('layout')

@section('content')
    {{-- Halaman Form Add User --}}
    <div class="pb-32">
        <p class="text-3xl font-bold mb-5">
            Style Configuration
        </p>
        <table class="mb-10">
            <tr>
                <td><label for="" class="w-40 font-bold">Logo</label></td>
                <td>
                    <img src="./Elfaita Project Logo (Mix & Landscape).png" alt="" class="h-10">
                </td>
                <td>
                    <form action="" method="POST" enctype="multipart/form-data" class="text-sm">
                        @csrf
                        <input type="file" name="logo" class="pl-10">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </td>
                <td></td>
            </tr>
        </table>

        <table>
            <tr class="font-bold">
                <td class="w-40">List of Menu</td>
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
                        <button class="btn btn-primary">
                            Change Icon
                        </button>
                    </td>
                </tr>
            @endforeach
            <tr class="h-10">

            </tr>
            @foreach ($colors as $color)
            <tr>
            @if ( $loop->iteration == 1)
                <td><label for="" class="pb-3 font-bold">Color Theme</label></td>
            @else
                <td></td>
            @endif
                <td class="bg-gradient-to-br {{ $color->theme_from }} {{ $color->theme_via }} {{ $color->theme_to }} mx-5"></td>
                <td class="pl-5 font-bold">
                    {{ $color->theme_name}}
                </td>
                <td>
                    @if ($color->theme_status == 1)
                        <button class="btn btn-success">Active</button>
                    @else
                        <button class="btn btn-danger">Inactive</button>
                    @endif
                </td>
                <td>
                    <form action="{{ route('update.theme', $color->theme_id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary
                        @if ($color->theme_status == 1)
                            disabled
                        @endif">Apply</button>
                        @include('sweetalert.success')
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection