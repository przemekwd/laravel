@extends('auth.auth')

@section('content')
    <div class="wrapper">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            <h2 class="form-signin-heading">@lang('auth.login_label')</h2>
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
            {{ csrf_field() }}

            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required="required"
                   placeholder="@lang('auth.form.username')" autofocus="autofocus">

            <input id="password" type="password" class="form-control" name="password" required="required"
                   placeholder="@lang('auth.form.password')" autofocus="autofocus">

            <label for="remember_me" class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="on">
                @lang('auth.form.remember')
            </label>

            <input type="submit" value="@lang('auth.login')" class="btn btn-lg btn-primary btn-block"/>

            <a href="{{ route('register') }}" class="btn btn btn-default btn-block">
                @lang('auth.register_label')
            </a>
        </form>
    </div>
@endsection
