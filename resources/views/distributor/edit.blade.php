@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">business</i>
        <span>@lang('distributor.edit')</span>
    </h1>

    {!! form($form) !!}

    <a href="{{ route('distributor.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
@endsection