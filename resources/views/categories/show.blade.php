@extends('layouts.master')

@section('content')

    <!-- Target Section: Categories -->
    <div class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen py-16 flex flex-col space-y-20 items-center">

        <!-- Category Heading and Cards -->
        <h2 class="text-6xl font-bold z-10">
            @if($students->isNotEmpty() and ($category != "nationalities")){{$students->first()->countyCode}} | @endif
            {{ $subcategory }}
        </h2>

        <x-student-results :$students />
    </div>

@endsection
