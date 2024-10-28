@extends('layouts.master')

@section('content')

<!-- Target Section: Categories -->
<div id="categoriesSection" class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen py-16 flex flex-col space-y-20 items-center">

    <!-- Category Heading and Cards -->
    <h2 class="text-6xl font-bold z-10">
        @if($students->isNotEmpty()){{$students->first()->countyCode}} | @endif
        {{ $subcategory }}
    </h2>

    @if ($students->isEmpty())
        <p class="text-xl z-10">No students found for this: {{ $subcategory }}.</p>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 z-10 w-4/6">
            @foreach ($students as $student)
                <div class="border p-4 rounded-lg">
                    <p>Name: {{ $student->name }}</p>
                    <p>County: {{ $student->county }}</p>
                    <p>Location: {{ $student->location }}</p>
                    <!-- Add any other student details you want to display -->
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
