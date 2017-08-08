@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">account_box</i>
        <span>
            @if(!empty($artist->name))
                {{ $artist->name }}
            @else
                {{ $artist->firstname }} {{ $artist->lastname }}
            @endif
        </span>
    </h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>
                @if(!empty($artist->band))
                    <i class="material-icons">people_outline</i>
                @else
                    <i class="material-icons">person_outline</i>
                @endif
                @lang('artist.show')
            </h3>
        </div>
        <div class="panel-body">
            <table class="table-condensed">
                <tbody>
                <tr>
                    <td class="strong">@lang('artist.form.birthdate_person_band')</td>
                    <td>
                        @if($artist->name)
                            {{ \Carbon\Carbon::parse($artist->birth_date)->format('Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($artist->birth_date)->format('d-m-Y') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="strong">@lang('artist.form.country')</td>
                    <td>{{ $artist->country }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('artist.edit', ['id' => $artist->id]) }}" class="btn btn-warning pull-right" role="button">
        @lang('buttons.edit')
    </a>

    {{ Form::open(['route' => ['artist.destroy', $artist->id], 'method' => 'DELETE']) }}
        <button class="btn btn-danger pull-right" type="submit" role="button">@lang('buttons.delete')</button>
    {{ Form::close() }}

    <a href="{{ route('artist.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
@endsection