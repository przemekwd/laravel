@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">audiotrack</i>
        <span>@lang('track.new')</span>
    </h1>

    {!! form($form) !!}

    <a href="{{ route('album.show', ['id' => $albumid]) }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
@endsection