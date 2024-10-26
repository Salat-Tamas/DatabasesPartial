<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Databases Partial Project</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="border-b-2 bg-black/5 border-black/25 w-full p-2">
        <div class="flex space-x-5 items-center">
            <div>
                <img src="{{ asset('images/logosapi.png') }}" alt="Logo" class="h-16"/>
            </div>
            <h1 class="text-4xl font-serif font-bold text-green-800 outline-4 outline-gray-600">EduGraph</h1>
        </div>
    </nav>

    <main class="h-full px-5 pt-5">
        @yield('content')
    </main>

    <footer class="border-t border-black/20 py-2 mx-5">
        <p>&copy; 2021 Database Manager</p>
    </footer>
    @vite('resources/js/app.js')
</body>
</html>
