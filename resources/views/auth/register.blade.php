@extends('auth.master')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto mt-12">
    <h1 class="text-3xl font-bold text-center mb-8">Register</h1>

    <form action="{{ route('auth.registerPost') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required value="{{ old('password') }}" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required value="{{ old('password_confirmation') }}" class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
        </div>
        @if ($errors->any())
            <div class="p-4 bg-red-50 text-red-800 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Register</button>
        <p class="text-center text-sm text-gray-600 mt-4">
            Already have an account? <a href="{{ route('auth.login') }}" class="text-black hover:underline">Login</a>
        </p>
    </form>
</div>
@endsection