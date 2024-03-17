   @extends('layout.base')

   @section('content')
        <form class="w-1/3 shadow-md p-8 mx-auto mt-20 rounded-lg" action="{{ route('register')}}" method="post">
          @csrf
            <h2 class="text-2xl text-center font-semibold mb-4">Register</h2>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Enter your name" value="{{ old('name')}}">
                @error('name')
                   <p class="text-sm text-red-600 mt-1 px-3"> {{$message}}</p> 
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Enter your username" value="{{ old('username')}}">
                @error('username')
                   <p class="text-sm text-red-600 mt-1 px-3"> {{$message}}</p> 
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400 " placeholder="Enter your email"value="{{ old('email')}}">
                @error('email')
                   <p class="text-sm text-red-600 mt-1 px-3"> {{$message}}</p> 
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Enter your password">
                @error('password')
                   <p class="text-sm text-red-600 mt-1 px-3"> {{$message}}</p> 
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Confirm your password">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Register</button>
        </form>
        @endsection