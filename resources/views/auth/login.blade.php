
   @extends('layout.base')

   @section('content')
        <form class="w-1/3 shadow-md p-8  py-20 mx-auto mt-20 rounded-lg" action="{{ route('login')}}" method="post">
          @csrf
            <h2 class="text-2xl text-center font-semibold mb-4">Login</h2>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Enter your email" value="{{ old('email')}}">
                @error('email')
                    <p class="text-sm text-red-500  px-3">{{ $message}} </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 focus:outline-none focus:ring-2 focus:rounded-sm focus:ring-blue-400" placeholder="Enter your password">
            @error('password')
                    <p class="text-sm text-red-500  px-3">{{ $message}} </p>
            @enderror
            @if(session('status'))
                    <p class="text-sm text-red-500  px-3 mt-1">{{ session('status')}} </p>
            @endif
            </div>
            <div class="mb-3 flex gap-2 px-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Login</button>
        </form>
        @endsection