@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">album</i>
        <span>@lang('artist.edit')</span>
    </h1>

    {!! form($form) !!}

    <a href="{{ route('artist.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <script src="http://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.genres').selectpicker();
            $('.mediums').selectpicker();
            $('.release').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
            });
        });
    </script>
@endsection