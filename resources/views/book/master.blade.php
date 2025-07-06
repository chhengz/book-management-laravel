<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .nav-link {
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #4B5563;
        }
        .btn-primary {
            background-color: #1F2937;
            color: #FFFFFF;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #374151;
        }
        .btn-danger {
            background-color: #EF4444;
            color: #FFFFFF;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #DC2626;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="text-2xl font-bold text-gray-900">Library</a>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('auth.login') }}" class="nav-link text-gray-600 hover:text-gray-900">Login</a>
                        <a href="{{ route('auth.register') }}" class="nav-link text-gray-600 hover:text-gray-900">Register</a>
                    @endguest
                    @auth
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <a href="{{ route('auth.logout') }}" class="btn-danger px-4 py-2 rounded-md text-sm font-medium">Logout</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8">
        @yield('content')
    </div>
</body>
</html>