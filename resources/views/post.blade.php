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
<div class="mt-4">
  @foreach ($posts as $post)
  <div class="bg-slate-800 w-1/2 mx-auto flex flex-col my-4 p-4 rounded-md text-white" >
    <div class="flex justify-between">
      <h2 class="text-xl font-bold tracking-wide">{{ $post->user->name}}</h2>
      <p>{{ $post->created_at->diffForHumans() }}</p>
    </div> 
    <p class="my-2">{{$post->body}}</p>
    <p>{{$post->likes->count() . " " . Str::plural('like',$post->likes->count())}} </p>
    @auth
    <div class=" flex gap-4">
      @if(!$post->likedBy(auth()->user()))
      <form action="{{ route('post.likes',$post) }}" method="post">
        @csrf
      <button type="submit" class="hover:text-green-500">Like</button>
      </form>
      @else
      <form action="{{ route('post.likes',$post)}}" method="post">
        @csrf
        @method('DELETE') 
        <button type="submit" class="hover:text-red-500">Unlike</button>
      </form>
      @endif
      </div>
      @endauth
      @if($post->ownedBy(auth()->user()))
        <div>
          <form action="{{ route('post.delete',$post) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="rounded-lg my-2 px-4 hover:bg-red-600 bg-red-500 text-white" type="submit">Delete</button>
          </form>
        </div>
        @endif
  </div>
  @endforeach
</div>
<div class="w-1/2 mx-auto">
{{ $posts->links() }}
</div>

@endsection