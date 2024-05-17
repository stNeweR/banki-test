<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('page.title')</title>
</head>
<body class="bg-slate-100 min-h-screen">
    <header class="container mx-auto">
        <div class="flex gap-5 py-2">
            <a href="{{ route('index') }}">Добавить фотографии</a>
            <a href="{{ route('images.index') }}">Посмотреть все фотографии</a>
        </div>
    </header>
    <div class="md:container md:mx-auto">
        @yield('page')
    </div>
    @stack('scripts')
</body>
</html>
