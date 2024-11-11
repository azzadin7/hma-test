<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Page</title>
    <link rel="shortcut icon" href="./Elfaita Project Logo (White & Square).png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/sass/app.scss'])
</head>
<body>  
    <div class="grid grid-cols-10 p-5 bg-gradient-to-br {{ $theme->theme_from }} {{ $theme->theme_via }} {{ $theme->theme_to }} min-h-screen">
        <div class="col-span-3">
            <img src="http://localhost:8000/Elfaita Project Logo (Mix & Landscape).png" alt="" class="h-20">
        </div>
        <div class="col-span-6 py-2">
            <div class="float-right mt-4 font-montserrat text-xl">
                Selamat Datang, <span class="font-bold">{{ $name }}</span>
            </div>
        </div>
        <div class="col-span-1 mt-4 pl-5">
            <a href="/config" class="text-decoration-none text-white">
                <button class="bg-gray-400 ml-3 px-3 py-2 rounded-lg hover:bg-gray-600">Config</button>
            </a>
        </div>

        <div class="col-span-3 mt-10">
            @include('navbar')
        </div>
        <div class="col-span-7 mt-10 pt-3 text-lg">
            @yield('content')
        </div>
    </div>

    @include('scripts')
</body>
</html>