@extends('layouts.app')

@section('content')
    <h3>Edit post</h3>
    <div class="max-width-750 mt-3">
        @include('inc.messages')
    </div>
    <form action="{{action('PostController@update',['post' => $post->id])}}" method="POST" class="max-width-750">
        @csrf
        @method('PUT')
        <input type="text" class="form-control mt-15" placeholder="Post Title" value="{{$post->title}}" name="title">
        <textarea name="body" rows="10" class="form-control mt-15" placeholder="Post Body">{{$post->body}}</textarea>
        <div class="text-center">
            <input type="submit" value="Save Post" class="btn btn-primary btn-custom mt-15">
        </div>

    </form>

@endsection