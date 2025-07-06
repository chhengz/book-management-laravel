@extends('auth.master')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-12">
    <h1 class="text-3xl font-bold text-center mb-8">Login</h1>

    @if(session('message'))
        <div class="mb-6 p-4 bg-yellow-50 text-yellow-800 rounded-lg flex justify-between items-center">
            <span>{{ session('message') }}</span>
            <button type="button" class="text-yellow-800 hover:text-yellow-900" onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif

    <form action="{{ route('auth.loginPost') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required class="form-input mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-900 placeholder-gray-400 focus:border-black">
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
        <button type="submit" class="btn w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Login</button>
        <p class="text-center text-sm text-gray-600 mt-4">
            Don't have an account? <a href="{{ route('auth.register') }}" class="text-black hover:underline">Register</a>
        </p>
    </form>
</div>
@endsection