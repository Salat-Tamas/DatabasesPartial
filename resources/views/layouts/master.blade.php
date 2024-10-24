<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Databases Partial Project</title>
    @vite('resources/css/app.css')
</head>
<body class="px-5 py-2">
    <nav>
        <div>
            <h1>Database Manager</h1>
        </div>
    </nav>

    <main class="h-full">
        @yield('content')
    </main>

    <footer class="border-t border-black/20 p-y-2">
        <p>&copy; 2021 Database Manager</p>
    </footer>
</body>
</html>
