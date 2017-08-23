@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">account_box</i>
        <span>@lang('artist.edit')</span>
    </h1>

    {!! form($form) !!}

    <a href="{{ route('album.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <script src="http://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.js-datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true
            });
        });
    </script>
@endsection