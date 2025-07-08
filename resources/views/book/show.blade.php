@extends('book.master')

@section('title', 'Book List')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Books</h1>
        @auth
            <a href="{{ route('book.create') }}" title="Add Book" class="btn-primary px-2 py-2 rounded-md text-sm font-medium inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

                Add Book</a>
        @endauth
    </div>

    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cover</th>
                    @auth
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-200 transition-colors duration-200">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $book->id }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $book->title }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $book->slug }}</td>
                        <td class="px-6 py-2 text-sm text-gray-900 line-clamp-1">{{ $book->description }}</td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <img src="{{ asset('Uploads/' . $book->cover) }}" alt="Book Cover" class="w-14 sm:w-16 md:w-18 h-auto rounded">
                        </td>
                        @auth
                            <td class="px-6 py-4 flex flex-col gap-1 text-sm font-medium">
                                <a href="{{ route('book.view', $book->id) }}" class="w-full btn-primary px-3 py-1 rounded-md mr-2 inline-flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </a>
                                <a href="{{ route('book.edit', $book->id) }}" class="w-full btn-primary px-3 py-1 rounded-md mr-2 inline-flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    Edit
                                </a>
                                <a href="{{ route('book.delete', $book->id) }}" class="w-full btn-danger px-3 py-1 rounded-md inline-flex items-center gap-1" onclick="return confirm('Are you sure you want to delete this book?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 012 2v0a2 2 0 01-2 2H7a2 2 0 01-2-2v0a2 2 0 012-2h10z" />
                                    </svg>
                                    Delete
                                </a>
                            </td>
                        @endauth

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection