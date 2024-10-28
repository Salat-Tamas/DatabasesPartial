{{-- resources/views/categories/locations/{subcategory}.blade.php --}}
@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold">{{ ucfirst($subcategory) }}</h1>
        <p>Displaying information for the {{ $subcategory }} subcategory within {{ $category }}.</p>

        {{-- Add your dynamic content here --}}
    </div>
@endsection