@extends('layouts.app')

@section('content')
    <h3>Create post</h3>
    <div class="max-width-750 mt-3">
        @include('inc.messages')
    </div>
    <form action="{{route('post.store')}}" method="POST" class="max-width-750">
        @csrf
        <input type="text" class="form-control mt-15" placeholder="Post Title" name="title">
        <textarea name="body" rows="10" class="form-control mt-15" placeholder="Post Body"></textarea>
        <div class="text-center">
            <input type="submit" value="Submit Post" class="btn btn-primary btn-custom mt-15">
        </div>

    </form>

@endsection