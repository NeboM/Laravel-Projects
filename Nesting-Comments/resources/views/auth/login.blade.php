@extends('layouts.app')

@section('content')



    <div class="container  mt-5 custom" style="max-width: 750px;">
        <div class="text-center">
            <h3 class="google-font-1">Login</h3>
            <p><small>Create a New Account</small></p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email*" name="email" value="{{ old('email') }}"  required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" placeholder="Password*" class="form-control" >
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <a href="/register"><p>Create a new account</p></a>

            <div class="text-center">
                <input type="submit" value="Sign in" class="btn btn-info mt-2 mb-4" style="width: 130px">
            </div>

        </form>
    </div>


@endsection
