@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:48px;">location_city</i>
        <span>@lang('distributor.list')</span>
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>@lang('distributor.form.name')</th>
                <th>@lang('distributor.form.country')</th>
                <th>@lang('distributor.form.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($distributors as $distributor)
            <tr>
                <td><i class="material-icons">domain</i></td>
                <td>{{ $distributor->name }}</td>
                <td>{{ $distributor->country }}</td>
                <td>
                    {{ Form::open(['route' => ['distributor.destroy', $distributor->id], 'method' => 'DELETE']) }}
                        <a href="{{ route('distributor.show', ['id' => $distributor->id]) }}" class="btn btn-info" role="button">
                            <i class="material-icons">info_outline</i>
                            @lang('buttons.show')
                        </a>
                        <a href="{{ route('distributor.edit', ['id' => $distributor->id]) }}" class="btn btn-warning" role="button">
                            <i class="material-icons">create</i>
                            @lang('buttons.edit')
                        </a>
                        <button class="btn btn-danger" type="submit" role="button">
                            <i class="material-icons">highlight_off</i>
                            @lang('buttons.delete')
                        </button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="#" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <a href="{{ route('distributor.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection