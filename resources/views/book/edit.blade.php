@extends('book.master')

@section('title', 'Edit Book')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Book</h1>
        <a href="{{ route('book.show') }}" class="btn-danger px-4 py-2 rounded-md text-sm font-medium">Cancel</a>
    </div>

    <div class="bg-white shadow-sm rounded-lg p-6">
        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" id="title" name="title" value="{{ $book->title }}" required>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" id="slug" name="slug" value="{{ $book->slug }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" required>{{ $book->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <input type="file" name="cover" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" id="cover">
            </div>

            <div class="mb-4">
                <img src="{{ asset('Uploads/' . $book->cover) }}" alt="Book Cover" class="w-24 h-auto rounded">
            </div>

            <div>
                <button type="submit" class="btn-primary px-4 py-2 rounded-md text-sm font-medium">Update Book</button>
            </div>
        </form>
    </div>
@endsection