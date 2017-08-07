@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:48px;">recent_actors</i>
        <span>@lang('artist.list')</span>
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>@lang('artist.form.name') / @lang('artist.form.firstname') i @lang('artist.form.lastname')</th>
                <th>@lang('artist.form.birthdate_person') / @lang('artist.form.birthdate_band')</th>
                <th>@lang('artist.form.country')</th>
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
                    <a href="{{ route('artist.show', ['id' => $artist->id]) }}" class="btn btn-info" role="button">
                        <i class="material-icons">info_outline</i>
                        @lang('buttons.show')
                    </a>
                    <a href="{{ route('artist.edit', ['id' => $artist->id]) }}" class="btn btn-warning" role="button">
                        <i class="material-icons">create</i>
                        @lang('buttons.edit')
                    </a>
                    <a href="{{ route('artist.destroy', ['id' => $artist->id]) }}" class="btn btn-danger" role="button">
                        <i class="material-icons">highlight_off</i>
                        @lang('buttons.delete')
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="#" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <a href="{{ route('artist.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection