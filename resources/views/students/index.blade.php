@extends('layouts.master')

@section('content')
    <div class="flex">
        <!-- Filter Section -->
        <div class="w-1/4 p-6 bg-gray-100 fixed h-full overflow-y-auto z-[9]">
            <form method="POST" action="{{ route('students.result') }}">
                @csrf
                <h2 class="text-xl font-bold mb-4">Filters</h2>

                <div class="mb-4 group">
                    <label for="search" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">Search</label>
                    <input type="text" name="search" id="search" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150" placeholder="Search for a student...">
                </div>

                <div class="mb-4 group">
                    <label for="location" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">Location</label>
                    <select name="location" id="location" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select Location</option>
                        @foreach($filters['locations'] as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="county" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">County</label>
                    <select name="county" id="county" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select County</option>
                        @foreach($filters['counties'] as $county)
                            <option value="{{ $county }}">{{ $county }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="nationality" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">Nationality</label>
                    <select name="nationality" id="nationality" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select Nationality</option>
                        @foreach($filters['nationalities'] as $nationality)
                            <option value="{{ $nationality }}">{{ $nationality }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="schoolType" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">School Type</label>
                    <select name="schoolType" id="schoolType" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select School Type</option>
                        @foreach($filters['schoolTypes'] as $schoolType)
                            <option value="{{ $schoolType }}">{{ $schoolType }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="schoolName" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">School Name</label>
                    <select name="schoolName" id="schoolName" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select School Name</option>
                        @foreach($filters['schoolNames'] as $schoolName)
                            <option value="{{ $schoolName }}">{{ $schoolName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="medium" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">Medium</label>
                    <select name="medium" id="medium" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150">
                        <option value="">Select Medium</option>
                        @foreach($filters['mediums'] as $medium)
                            <option value="{{ $medium }}">{{ $medium }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 group">
                    <label for="native" class="block text-gray-700 group-hover:font-semibold group-hover:scale-105 duration-150 group-focus-within:font-semibold">Native</label>
                    <input type="text" name="native" id="native" class="w-full px-2 py-1 border rounded group-hover:border-none group-hover:scale-105 group-focus-within:scale-105 duration-150" placeholder="Native">
                </div>

                <button type="submit" class="w-full bg-green-800 text-white py-2 rounded">Apply Filters</button>
            </form>
        </div>

        <!-- Results Section -->
        <div class="w-3/4 p-4 ml-[25%]">
            @if(isset($students) && $students->isNotEmpty())
                @if(isset($search))
                    <div>
                        <span class="text-2xl font-normal text-gray-600 pr-6">Results for:</span>
                        <span class="text-2xl font-semibold text-green-800">{{ $search }}</span>
                    </div>
                @endif

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 mt-4">
                    @foreach($students as $student)
                        <x-small-student-card :$student />
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No results found.</p>
            @endif
        </div>
    </div>
@endsection
