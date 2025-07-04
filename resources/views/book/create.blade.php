@extends('book.master')

@section('title', 'Add Book')

@section('content')
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="">📚 Create Book</h1>
            <a href="{{ route('book.show') }}" class="btn btn-warning">❌Cancel</a>
        </div>
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group mb-4">
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="Title">
            </div>
            <div class="form-group mb-4">
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required placeholder="Slug">
            </div>
            <div class="form-group mb-4">
                <textarea name="description" class="form-control" placeholder="Description" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group mb-4">
                <input type="file" name="cover" class="form-control" id="cover">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">➕Add Book</button>
            </div>

        </form>

@endsection
