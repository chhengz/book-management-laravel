@extends('auth.master')

@section('title', 'Login')

@section('content')

<div class="container my-5">
    <h1 class="text-center">Login</h1>
    <form action="{{ route('auth.loginPost') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
        @csrf

        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger col-md-6">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Login</button>

        <div class="mt-3">
            <p>Don't have an account? <a href="{{ route('auth.register') }}">Register</a></p>
        </div>

    </form>
</div>

@endsection
