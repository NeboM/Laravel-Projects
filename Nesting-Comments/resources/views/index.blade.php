@extends('layouts.app')

@section('content')

    <div class="container  mt-5 custom text-center" style="max-width: 750px;">
        <h3 class="google-font-1">Posts</h3>
        <table class="table table-striped mt-3">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-link" style="color: #4aa0e6">Show Post</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
                </table>
            </div>

@endsection