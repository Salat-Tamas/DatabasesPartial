@extends('layouts.master')

@section('content')
    <!-- Button Section -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex flex-col space-y-6 items-center">
            <div class="flex space-x-5 items-center select-none">
                <div>
                    <img src="{{ asset('images/logosapi.png') }}" alt="Logo" class="h-[150px]" draggable="false" />
                </div>
                <h1 class="text-8xl font-serif font-bold text-green-800 outline-4 outline-gray-600">EduGraph</h1>
            </div>

            <button
                id="scrollButton"
                class="px-8 py-4 bg-green-800 text-white rounded-lg text-xl font-semibold shadow-lg hover:bg-green-600 hover:border-2 hover:border-gray-800 transition duration-200 max-w-56"
            >
                View Categories
            </button>
        </div>
    </div>

    @php
        $categories = [
            [
                'title' => 'County',
                'description' => 'All the end-of-year exams sorted into counties.',
                'href' => '/counties'
            ],
            [
                'title' => 'Nationality',
                'description' => 'All the end-of-year exams sorted by nationality.',
                'href' => '/nationalities'
            ],
            [
                'title' => 'School',
                'description' => 'All the end-of-year exams sorted by schools.',
                'href' => '/schools'
            ],
            [
                'title' => 'Location',
                'description' => 'All the end-of-year exams sorted by location.',
                'href' => '/locations'
            ],
        ];

        // Example GIF URLs for the blobs
        $blobGifs = [
            asset('images/blob1.gif'),
            asset('images/blob2.gif'),
            asset('images/blob3.gif'),
            asset('images/blob4.gif'),
            asset('images/blob5.gif'),
        ];
    @endphp

    <!-- Target Section: Categories -->
    <div id="categoriesSection" class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen py-16 flex flex-col space-y-20 items-center overflow-hidden">
        <!-- Blob Background Component -->
        <x-blob-gif-background :gifs="$blobGifs"/>

        <div class="flex flex-col space-y-20 z-10 items-center">
            <!-- Category Heading and Cards -->
            <h2 class="text-6xl font-bold z-10">Categories</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 z-10">
                @foreach ($categories as $category)
                    <x-card :title="$category['title']" :description="$category['description']" :href="'/categories' . $category['href']"/>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Scroll Script -->
    <script>
        document.getElementById('scrollButton').addEventListener('click', function () {
            document.getElementById('categoriesSection').scrollIntoView({ behavior: 'smooth' });
        });

        // Randomize blob positions
        document.querySelectorAll('.blob-gif').forEach(blob => {
            const randomX = Math.random() * 85; // Random percentage from 0% to 85%
            const randomY = Math.random() * 85; // Random percentage from 0% to 85%
            blob.style.left = `${randomX}vw`; // Use vw for responsive positioning
            blob.style.top = `${randomY}vh`; // Use vh for responsive positioning
        });
    </script>
@endsection
