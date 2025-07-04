@extends('auth.master')
<!-- @section('title', 'Register') -->

@section('title', 'Register')


@section('content')

    <div class="container my-5">
        <h1 class="text-center">Register</h1>
        <form action="{{ route('auth.registerPost') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
            @csrf
                <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value="{{ old('password') }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required value="{{ old('password_confirmation') }}">
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
            <button type="submit" class="btn btn-primary">Register</button>

            <div class="mt-3">
                <p>Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
            </div>

        </form>
    </div>

@endsection
