@extends('book.master')

@section('title', 'Book List')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="">📚 Book Table</h1>

        @auth
            <a href="{{ route('book.create') }}" class="btn btn-info">➕ Add Book</a>
        @endauth
    </div>

    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Cover</th>
                @auth
                <th>Action</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            <!-- @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->slug }}</td>
                    <td>{{ $book->description }}</td>
                    <td><img src="{{ asset('uploads/' . $book->cover) }}" alt="Book Cover" style="width: 100px; height: auto;">
                    </td>
                    @auth
                    <td>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">📝 Edit</a>
                            <a href="{{ route('book.delete', $book->id) }}" class="btn btn-danger"
                            onclick="return confirm('You want to delete this item?')">🗑 Delete</a>
                    </td>
                    @endauth

                </tr>
            @endforeach
        </tbody>
@endsection
