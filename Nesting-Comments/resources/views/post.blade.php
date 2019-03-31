@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center google-font-1"><h4>Create Post</h4></div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Post Title: </label>
                                <input placeholder="Post title" type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Body: </label>
                                <textarea placeholder="Post body" name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-link" style="color: #4aa0e6" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection