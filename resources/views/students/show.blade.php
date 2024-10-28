@extends('layouts.master')

@section('content')
    <div class="bg-gradient-to-b border-t-2 border-separate from-gray-100 to-green-200 relative min-h-screen px-10 py-16 flex flex-col space-y-20 items-center">
        <div class="flex flex-col lg:w-2/3 w-5/6">
            <x-student-card :$student />
        </div>
    </div>
@endsection
