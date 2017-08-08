@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">business</i>
        <span>{{ $distributor->name }}</span>
    </h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>
                <i class="material-icons">help_outline</i>
                @lang('distributor.show')
            </h3>
        </div>
        <div class="panel-body">
            <table class="table-condensed">
                <tbody>
                    <tr>
                        <td class="strong">@lang('distributor.form.country')</td>
                        <td>{{ $distributor->country }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('distributor.edit', ['id' => $distributor->id]) }}" class="btn btn-warning pull-right" role="button">
        @lang('buttons.edit')
    </a>

    {{ Form::open(['route' => ['distributor.destroy', $distributor->id], 'method' => 'DELETE']) }}
        <button class="btn btn-danger pull-right" type="submit" role="button">@lang('buttons.delete')</button>
    {{ Form::close() }}

    <a href="{{ route('distributor.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
@endsection