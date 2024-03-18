@extends('layout.base')

@section('content')

  <div class="text-center p-6">
    <h1 class="font-bold">{{$user->name}}</h1>
    <p>posts: {{ $posts->count()}}</p>
    <p>likes: {{ $user->receivedLikes->count()}}</p>
  </div>
  <hr>
  {{-- using blade conponent --}}
  @foreach($posts as $post)
    <x-post-component :post="$post" />
  @endforeach

@endsection