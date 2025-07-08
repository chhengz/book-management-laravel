@extends('book.master')

@section('title', 'Book\'s Detail')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Book's Detail</h1>
        {{-- <a href="{{ route('book.show') }}" class="btn-danger px-4 py-2 rounded-md text-sm font-medium">Cancel</a> --}}
        <a href="{{ route('book.show') }}" class="inline-block mb-6 text-sm font-medium text-gray-600 hover:text-black transition-colors">
            ← Back to Book List
        </a>
    </div>

    <div>
        <div class="bg-white shadow-sm flex rounded-lg p-6">
            <div class="mr-6">
                <img src="{{ asset('Uploads/' . $book->cover) }}" alt="Book Cover" class="w-32 h-auto rounded">
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">{{ $book->title }}</h2>
                <p class="text-gray-700 mb-4"><strong>Slug:</strong> {{ $book->slug }}</p>
                <p class="text-gray-700 mb-4"><strong>Description:</strong> {{ $book->description }}</p>
                
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('book.show') }}" class="btn-primary px-4 py-2 rounded-md text-sm font-medium">Back to Book List</a>
        </div>
    </div>

    
@endsection