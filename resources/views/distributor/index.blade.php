@extends('base')

@section('content')
    {{ Form::open(['route' => ['distributor.index'], 'method' => 'GET']) }}
        <h1>
            <div class="pull-left">
                <i class="material-icons" style="font-size:48px;">location_city</i>
                <span>@lang('distributor.list')</span>
            </div>
            <div class="pull-right form-inline" style="font-size: 30px;">
                <input type="text" class="form-inline" name="search" value="{{ $search }}"/>
                <button class="btn form-inline btn-white" type="submit">
                    <i class="material-icons" style="font-size:48px;">pageview</i>
                </button>
            </div>
        </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        @lang('distributor.form.name')
                        <button class="btn btn-default filter" type="submit" name="filter" value="name ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="name DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('distributor.form.country')
                        <button class="btn btn-default filter" type="submit" name="filter" value="country ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="country DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
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
    {{ Form::close() }}

    <a href="#" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <a href="{{ route('distributor.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection