@extends('book.master')

@section('title', 'Book List')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Books</h1>
        @auth
            <a href="{{ route('book.create') }}" class="btn-primary px-4 py-2 rounded-md text-sm font-medium">Add Book</a>
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
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->slug }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $book->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('Uploads/' . $book->cover) }}" alt="Book Cover" class="w-16 h-auto rounded">
                        </td>
                        @auth
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('book.edit', $book->id) }}" class="btn-primary px-3 py-1 rounded-md mr-2">Edit</a>
                                <a href="{{ route('book.delete', $book->id) }}" class="btn-danger px-3 py-1 rounded-md" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection