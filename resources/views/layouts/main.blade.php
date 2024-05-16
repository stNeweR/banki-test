<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('page.title')</title>
</head>
<body class="bg-slate-100 min-h-screen">
    <div class="md:container md:mx-auto">
        @yield('page')
    </div>
</body>
</html>
