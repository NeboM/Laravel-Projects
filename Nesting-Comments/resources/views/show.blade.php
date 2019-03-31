@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')


    <div class="container  mt-5 custom text-center" style="max-width: 750px;">
        <div class="row justify-content-center">
            <div class="col-md-12">

                        <h3>{{ $post->title }}</h3>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h4>Comments:</h4>
                        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                        <hr />
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment_body" placeholder="Your comment..." class="form-control"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-link" style="color: #4aa0e6" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection