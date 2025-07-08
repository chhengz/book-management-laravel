@extends('book.master')

@section('title', 'Book\'s Detail')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
            <!-- Eye Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            </svg>
            Book's Detail
        </h1>
        <a href="{{ route('book.show') }}"
           class="inline-flex items-center gap-1 text-sm font-medium text-gray-600 hover:text-black transition-colors">
            <!-- Arrow Left Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7" />
            </svg>
            Back to Book List
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col md:flex-row gap-6 animate-fade-in">
        <!-- Book Cover -->
        <div class="flex-shrink-0">
            <img src="{{ asset('Uploads/' . $book->cover) }}" alt="Book Cover"
                 class="w-32 h-auto rounded shadow-md hover:scale-105 transition duration-300">
        </div>

        <!-- Book Info -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $book->title }}</h2>

            <p class="text-gray-700 mb-2 flex items-start gap-2">
                <!-- Link Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-1 text-gray-500" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.828 10.172a4 4 0 010 5.656m-3.656-5.656a4 4 0 010 5.656M8 12H6a4 4 0 010-8h2m8 0h2a4 4 0 010 8h-2" />
                </svg>
                <span><strong>Slug:</strong> {{ $book->slug }}</span>
            </p>

            <p class="text-gray-700 flex items-start gap-2">
                <!-- Text Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-1 text-gray-500" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 16h8M8 12h8m-8-4h8M4 6h16" />
                </svg>
                <span><strong>Description:</strong> {{ $book->description }}</span>
            </p>
        </div>
    </div>

    <div class="flex mt-6">
        <a href="{{ route('book.show') }}"
           class="w-fit btn-primary flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition hover:scale-105 hover:bg-indigo-600">
            <!-- Return Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7" />
            </svg>
            Back to Book List
        </a>
    </div>

    {{-- Fade animation --}}
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
