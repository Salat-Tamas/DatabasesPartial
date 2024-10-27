@props(['title', 'description', 'href'])

<a href="categories/{{ $href }}">
    <div class="w-full flex rounded-3xl bg-black/15 px-7 py-3 min-h-32 bg-clip-padding backdrop-filter backdrop-blur-md border border-gray-100 flex-col space-y-4 relative overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:border-2 hover:border-black/75 group items-center select-none">

        <!-- Background overlay with sliding effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-transparent opacity-60 transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0 z-0"></div>

        <!-- Card Content -->
        <div class="relative z-10">
            <h3 class="text-3xl font-bold border-b-2 pb-2 border-black/45">{{ $title }}</h3>
            <p class="text-lg text-black/45">{{ $description }}</p>
        </div>

    </div>
</a>
