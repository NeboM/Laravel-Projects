<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyTaskList') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
        .max-width {
            max-width: 595px;
            margin: 0 auto;
        }
        .card {
            border-radius: 10px !important;
        }
        * {
            font-family: "Franklin Gothic Demi","Goudy Old Style","Franklin Gothic Demi",Serif;
        }
        body{
            background-color: #f9f9f9 !important;
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>



<form class="max-width mt-5 card p-5" action="{{action('MailController@send')}}" method="POST">
    @csrf
    <h4 class="text-center">GMAIL SMTP</h4>
    <div class="form-group">
        <label><h5>Name</h5></label>
        <input type="text" class="form-control" placeholder="Your name" name="name">
    </div>
    <div class="form-group">
        <label><h5>Email address</h5></label>
        <input type="email" class="form-control" placeholder="Enter email to send to" name="email">
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label><h5>Title</h5></label>
        <input type="text" class="form-control" placeholder="Message title" name="title">
    </div>
    <div class="form-group">
        <label><h5>Message content</h5></label>
        <textarea name="body" class="form-control" rows="4" placeholder="Your message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

@if($errors->any)
    <div class="max-width mt-3">
        @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
        @endforeach
    </div>
@endif

</body>
</html>
