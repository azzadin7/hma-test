<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="./Elfaita Project Logo (White & Square).png" type="image/x-icon">
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/sass/app.scss'])
</head>
<body>
    <div class="bg-gradient-to-br from-blue-800 via-cyan-600 to-green-500 min-h-screen pt-40">
        <div class="bg-white justify-self-center p-10 w-3/4 lg:w-1/2 xl:w-1/3 border-2 rounded-xl mx-auto">
            <p class="text-4xl text-center font-bold">LOGIN</p>
            <form action="{{ route('post.login') }}" method="POST" class="mt-10 text-left text-2xl">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-10">
                    <div class="col-span-4 pt-3">
                        <label for="" class="">EMAIL</label>
                    </div>
                    <div class="col-span-6 pt-3">
                        <input type="text" id="email" name="email" class="form-control">
                    </div>

                    <div class="col-span-4 pt-3">
                        <label for="" class="">PASSWORD</label>
                    </div>
                    <div class="col-span-6 pt-3">
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="col-span-4 pt-3">

                    </div>
                    <div class="col-span-6 pt-3">
                        <button type="submit" class="btn btn-primary py-2 px-5 float-right">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>