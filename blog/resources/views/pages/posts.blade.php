@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @include('inc.messages')
    <div class="card mt-3">
        <div class="card-header">
            <a href="/post/create">Add post</a>
        </div>
        <div class="card-body">
            @if(count($posts) > 0)
                @foreach($posts as $post)

                    <div class="mt-5 container">
                        <h3><a href="post/{{$post->id}}">{{$post->title}}</a></h3>
                        <p>{{$post->body}}</p>
                        <p class="mb-2 mt-4"><small>Created at: {{$post->created_at}}</small></p>
                        <p class="mb-5"><small>Created by: {{$post->user->name}}</small></p>
                    </div>
                    <hr>


                @endforeach

                    {{$posts->links()}}

            @else
                <h5 class="mt-15">No posts found</h5>
            @endif
        </div>

    </div>

@endsection
