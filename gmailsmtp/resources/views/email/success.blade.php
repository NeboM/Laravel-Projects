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
            max-width: 550px;
            margin: 0 auto;
        }
        .card {
            border-radius: 10px !important;
        }
        * {
            font-family: "Franklin Gothic Demi","Goudy Old Style","Franklin Gothic Demi",Serif;
        }
        p {
            font-size: 18px;
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div class="max-width mt-5">
    <p>
        Email sent successfully
        <p><a href="/" class="mt-5">Go back</a></p>
    </p>
</div>

</body>
</html>
