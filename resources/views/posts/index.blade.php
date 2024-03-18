@extends('layout.base')
@section('content')
@auth
<div class="w-1/2 mx-auto mt-10 shadow-xl p-8 rounded-md">
  <h3 class="text-center text-lg tracking-wider font-semibold">Create a post</h3>
  <form action="{{ route('post')}}" class="my-2 flex flex-col gap-4 items-center" method="post">
    @csrf
    <textarea name="body" id="body" cols="30" rows="5" placeholder="Enter your post here" class=" text-gray-500 border-2 border-gray-300 focus:border-gray-500 outline-none rounded-lg resize-none p-4 w-1/2"></textarea>
    @error('content')
        <p class="text-sm text-red-500 px-4">{{ "*" . $message . "*"}}</p>
    @enderror
    <div class="w-1/2 ">
      <button type="submit" class="bg-blue-500  text-white px-4 py-2 text-lg rounded-md hover:bg-blue-600">Post</button>
    </div>
  </form>
</div>
@endauth
{{-- viewing posts --}}
<div class="mt-4">
  @foreach ($posts as $post)
    <x-post-component :post='$post' />
  @endforeach
</div>
<div class="w-1/2 mx-auto">
{{ $posts->links() }}
</div>

@endsection