@extends('auth.auth')

@section('content')
    <div class="wrapper">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            <h2 class="form-signin-heading">@lang('auth.register_label')</h2>
            {{ csrf_field() }}
            @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif

            <div>
                <label for="email" class="required">@lang('auth.form.email')</label>
                <input id="email" type="email" class="form-control mb-2" name="email" value="{{ old('email') }}"
                       required="required" autofocus="autofocus" placeholder="example@example.com"/>
            </div>

            <div>
                <label for="name" class="required">@lang('auth.form.username')</label>
                <input id="name" type="text" class="form-control mb-2" name="name" value="{{ old('name') }}"
                       required="required" placeholder="example"/>
            </div>

            <div>
                <label for="password">@lang('auth.form.password')</label>
                <input id="password" type="password" class="form-control mb-2" name="password" required="required"
                        placeholder="******">
            </div>

            <div>
                <label for="password-confirm">@lang('auth.form.password-confirm')</label>
                <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation"
                       required="required" placeholder="******">
            </div>

            <div>
                <button type="submit" class="btn btn-md btn-primary pull-right">@lang('auth.register')</button>
            </div>

            <a href="{{ route('login') }}" class="btn btn-default pull-left">@lang('auth.back')</a>
        </form>
    </div>
@endsection
