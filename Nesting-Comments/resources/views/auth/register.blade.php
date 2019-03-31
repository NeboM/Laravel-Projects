@extends('layouts.app')

@section('content')

    <div class="container  mt-5 custom" style="max-width: 750px;">
        <div class="text-center">
            <h3 class="google-font-1">Register</h3>
            <p><small>Create a New Account</small></p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                <input id="name" type="text" placeholder="Name*" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password*" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password*" name="password_confirmation" required>
            </div>

            <a href="/login"><p>Sign in</p></a>

            <div class="text-center">
                <input type="submit" value="Sign up" class="btn btn-info mt-2 mb-4" style="width: 130px">
            </div>

        </form>
    </div>

@endsection
