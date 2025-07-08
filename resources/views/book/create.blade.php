@extends('book.master')

@section('title', 'Add Book')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
            <!-- Book Plus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Book
        </h1>
        <a href="{{ route('book.show') }}"
            class="btn-danger flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition hover:bg-red-600 hover:scale-105">
            <!-- Cancel Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </a>
    </div>

    <div class="bg-white shadow-md hover:shadow-xl transition-all duration-300 rounded-lg p-6 animate-fade-in">
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4 rounded animate-pulse">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                    <!-- Title Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                    Title
                </label>
                <input type="text" id="title" name="title" required
                    value="{{ old('title') }}"
                    class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200" />
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                    <!-- Link Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 010 5.656m-3.656-5.656a4 4 0 010 5.656M8 12H6a4 4 0 010-8h2m8 0h2a4 4 0 010 8h-2" />
                    </svg>
                    Slug
                </label>
                <input type="text" id="slug" name="slug" required
                    value="{{ old('slug') }}"
                    class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200" />
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                    <!-- Text Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-8-4h8M4 6h16" />
                    </svg>
                    Description
                </label>
                <textarea id="description" name="description" required
                    class="mt-1 block w-full p-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">{{ old('description') }}</textarea>
            </div>

            {{-- Cover --}}
            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700 flex items-center gap-1">
                    <!-- Image Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M7 10l5 5 5-5" />
                    </svg>
                    Cover Image
                </label>
                <input type="file" name="cover" id="cover"
                    class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition duration-200" />
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                    class="btn-primary flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition hover:scale-105 hover:bg-indigo-600">
                    <!-- Save Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Add Book
                </button>
            </div>
        </form>
    </div>

    {{-- custom fade-in animation --}}
    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
