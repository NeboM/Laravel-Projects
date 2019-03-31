@extends('layouts.app')

@section('content')
    <div class="container  mt-5 custom text-center" style="max-width: 750px;">
        <h3 class="google-font-1">Welcome</h3>
        <p><a href="/posts">Posts</a></p>
        <p><a href="/post/create">Create Post</a></p>
        <p><small>Username: {{\Illuminate\Support\Facades\Auth::user()->name}}</small></p>
        <p><small>Email: {{\Illuminate\Support\Facades\Auth::user()->email}}</small></p>
        <p><small>Created at: {{ \Illuminate\Support\Facades\Auth::user()->created_at }}</small></p>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" value="Click here to logout" style="color: #3f9ae5" class="btn btn-link">Click here to logout</button>
        </form>
    </div>

@endsection
