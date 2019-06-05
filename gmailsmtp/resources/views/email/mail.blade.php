<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .max-width {
            max-width: 600px;
            margin: 0 auto;
        }
        .mt-5 {
            margin-top: 10px;
        }
        .text-center {
            text-align: center;
        }
        .float-left {
            float: left;
        }
    </style>
</head>
<body>

    <div class="max-width mt-5">
        <h3 class="text-center">{{$title}}</h3>
        <p>{{$body}}</p>
        <p><small class="float-left">- {{$name}}</small></p>
    </div>

</body>
</html>
