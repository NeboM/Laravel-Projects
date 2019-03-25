@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    @include('inc.messages')
    <div class="card mt-3">
        <div class="card-header">
            <p>My Posts</p>
            <a href="post/create">Add Post</a>
        </div>
        <div class="card-body">

            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="mt-5 container">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <p class="mb-5 mt-4"><small>Created at: {{$post->created_at}}</small></p>
                    </div>
                    <a href="post/{{$post->id}}/edit" class="btn btn-outline-dark btn-custom">Edit Post</a>
                    <form action="{{action("PostController@destroy",['post'=>$post])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete Post" class="btn btn-outline-danger btn-custom mt-3">
                    </form>
                    <br>
                    <hr>
                @endforeach
                {{$posts->links()}}
            @else
                <h5 class="mt-15">No posts found</h5>
            @endif


        </div>
    </div>
@endsection
