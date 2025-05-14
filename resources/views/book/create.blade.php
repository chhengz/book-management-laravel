<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="">Create Book</h1>
            <a href="{{ route('book.show') }}" class="btn btn-warning">Cancel</a>
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
                <button type="submit" class="btn btn-primary">Add Book</button>
            </div>

        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
