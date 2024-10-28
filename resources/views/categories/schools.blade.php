@extends('layouts.master')

@section('content')

@php
use App\Models\ExamStudent;

$schools = ExamStudent::select('schoolName')->distinct()->orderBy('shortSchoolName')->get();
@endphp

<!-- Target Section: Categories -->
<div id="categoriesSection" class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen py-16 flex flex-col space-y-20 items-center">

    <!-- Category Heading and Cards -->
    <h2 class="text-6xl font-bold z-10">Schools</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 z-10 w-4/6">
        @foreach ($schools as $school)
            <x-card :title="$school->schoolName" :href="url()->current() . '/' . $school->schoolName"/>
        @endforeach
    </div>
</div>

@endsection
