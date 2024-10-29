@extends('layouts.master')

@section('content')

    <div class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen px-10 py-16 flex flex-col space-y-20 items-center">
        <div>
            <span class="text-6xl font-normal text-gray-600 pr-6">Results for:</span>
            <span class="text-6xl font-semibold text-green-800">{{ $search }}</span>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6">
            @foreach($students as $student)
                <x-small-student-card :$student />
            @endforeach
        </div>
    </div>

@endsection
