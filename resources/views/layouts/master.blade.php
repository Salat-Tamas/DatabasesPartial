<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGraph - Database Visualizer</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-b from-green-100 to-green-300">

    <!-- Main Content Wrapper with Flex Grow to Push Footer to Bottom -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-black/20 bg-gray-800 text-white p-4 text-center">
        @include('partials.footer')
    </footer>
</body>
</html>