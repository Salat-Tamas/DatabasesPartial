<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGraph - Database Visualizer</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-b from-gray-100 to-green-200">
    @if (!request()->is('/'))
        <!-- Go Back Button -->
        <button id="goBackBtn"
                class="z-10 backdrop-filter backdrop-blur-md bg-opacity-30 fixed bottom-5 left-5 border-2 hover:bg-opacity-30 hover:backgrdrop-blur hover:backdrop-blur-md border-black bg-green-600 hover:bg-gray-300 text-white p-3 rounded-full w-12 md:w-16 shadow-2xl transition duration-300">
            <img src="{{ asset('svgs/back-gray.svg') }}" alt="Go Back" id="goBackTopIcon"/>
            <img src="{{ asset('svgs/back-dark-green.svg') }}" alt="Go Back" class="hidden" id="goBackTopIconHover"/>
        </button>
    @endif
    <!-- Main Content Wrapper with Flex Grow to Push Footer to Bottom -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-black/20 bg-gray-800 text-white p-4 text-center">
        @include('partials.footer')
    </footer>

    <!-- Jump to Top Button -->
    <button id="scrollToTopBtn"
            class="backdrop-filter backdrop-blur-md bg-opacity-30 fixed bottom-5 right-5 border-2 hover:bg-opacity-30 hover:backgrdrop-blur hover:backdrop-blur-md border-black hover:bg-gray-300 bg-green-600 text-white p-3 rounded-full w-12 md:w-16 shadow-2xl hidden transition duration-300">
        <img src="{{ asset('svgs/jump-gray.svg') }}" alt="Jump to Top" id="topIcon" />
        <img src="{{ asset('svgs/jump-dark-green.svg') }}" class="hidden"  alt="Jump to Top" id="topIconHover" />
    </button>

    <script>
        // Get the button and SVG elements
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        const topIcon = document.getElementById('topIcon');
        const topIconHover = document.getElementById('topIconHover');

        // Show button when scrolled down 100px
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        };

        // Change SVG on hover
        scrollToTopBtn.addEventListener('mouseenter', () => {
            topIcon.classList.add('hidden');     // Hide default icon
            topIconHover.classList.remove('hidden'); // Show hover icon
        });

        scrollToTopBtn.addEventListener('mouseleave', () => {
            topIcon.classList.remove('hidden'); // Show default icon
            topIconHover.classList.add('hidden');   // Hide hover icon
        });

        // Scroll to top when button is clicked
        scrollToTopBtn.onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        // Go back when the Go Back button is clicked
        const goBackBtn = document.getElementById('goBackBtn');
        if (goBackBtn) {
            goBackBtn.onclick = function() {
                window.history.back();
            };
        }

        goBackBtn.addEventListener('mouseenter', () => {
            goBackTopIcon.classList.add('hidden');
            goBackTopIconHover.classList.remove('hidden');
        });

        goBackBtn.addEventListener('mouseleave', () => {
            goBackTopIcon.classList.remove('hidden');
            goBackTopIconHover.classList.add('hidden');
        });
    </script>

</body>
</html>
