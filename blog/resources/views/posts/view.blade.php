@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <hr>
    <p>{{$post->body}}</p>
    <hr>
    <p><small>Created at: {{$post->created_at}}</small></p>
    <p><small>Last modified: {{$post->updated_at}}</small></p>
    <p><small>Post created by: {{$post->user->name}}</small></p>
    @if($post->user_id === \Illuminate\Support\Facades\Auth::id())
        <a href="/post/{{$post->id}}/edit" class="btn btn-outline-dark btn-custom">Edit Post</a>

        <form action="{{action("PostController@destroy",['post'=>$post->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Post" class="btn btn-outline-danger btn-custom mt-3">
        </form>

    @endif

@endsection
