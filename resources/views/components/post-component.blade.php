@props(['post'=> $post])
<div class="bg-slate-800 w-1/2 mx-auto flex flex-col my-4 p-4 rounded-md text-white" >
    <div class="flex justify-between">
      <h2 class="text-xl font-bold tracking-wide"><a href="{{ route('user.posts', $post->user)}}">{{ $post->user->name}}</a></h2>
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
      @can('delete',$post)
        <div>
          <form action="{{ route('post.delete',$post) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="rounded-lg my-2 px-4 hover:bg-red-600 bg-red-500 text-white" type="submit">Delete</button>
          </form>
        </div>
        @endcan
</div>