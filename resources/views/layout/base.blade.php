<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty</title>
</head>
<body>
    <nav class="bg-gray-200 py-6 shadow flex justify-between items-center px-32">
        <ul class="flex gap-8">
            <li><a href="{{ route('home')}}">Home</a></li>
            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li><a href="{{ route('post') }}">Post</a></li>
        </ul> 
        <ul class="flex gap-8">
            @guest
            <li><a href="{{ route('login')}}">Login</a></li>
            <li><a href="{{ route('register')}}">Register</a></li>
            @endguest
            @auth
            <li class="cursor-pointer">{{ auth()->user()->name}},</li>
            <li>
                <form action="{{ route('logout')}}" method="post">
                @csrf
                <button type="submit">logout</button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
   @yield('content') 
    </main>
</body>
</html>
