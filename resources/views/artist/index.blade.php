@extends('base')

@section('content')
    {{ Form::open(['route' => ['artist.index'], 'method' => 'GET']) }}
        <h1>
            <div class="pull-left">
                <i class="material-icons" style="font-size:48px;">recent_actors</i>
                <span>@lang('artist.list')</span>
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
                        @lang('artist.form.name') / @lang('artist.form.firstname') i @lang('artist.form.lastname')
                        <button class="btn btn-default filter" type="submit" name="filter" value="name ASC,lastname ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="name DESC,lastname DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('artist.form.birthdate_person') / @lang('artist.form.birthdate_band')
                        <button class="btn btn-default filter" type="submit" name="filter" value="birth_date ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="birth_date DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('artist.form.country')
                        <button class="btn btn-default filter" type="submit" name="filter" value="country ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="country DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>@lang('artist.form.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                <tr>
                    <td>
                        @if(!empty($artist->band))
                            <i class="material-icons">people_outline</i>
                        @else
                            <i class="material-icons">person_outline</i>
                        @endif
                    </td>
                    <td>
                        @if($artist->name != null)
                            {{ $artist->name }}
                        @else
                            {{ $artist->firstname }} {{ $artist->lastname }}
                        @endif
                    </td>
                    <td>
                        @if(!empty($artist->band))
                            {{ \Carbon\Carbon::parse($artist->birth_date)->format('Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($artist->birth_date)->format('d-m-Y') }}
                        @endif
                    </td>
                    <td>{{ $artist->country }}</td>
                    <td>
                        {{ Form::open(['route' => ['artist.destroy', $artist->id], 'method' => 'DELETE']) }}
                            <a href="{{ route('artist.show', ['id' => $artist->id]) }}" class="btn btn-info" role="button">
                                <i class="material-icons">info_outline</i>
                                @lang('buttons.show')
                            </a>
                            <a href="{{ route('artist.edit', ['id' => $artist->id]) }}" class="btn btn-warning" role="button">
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
    <a href="{{ route('artist.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection