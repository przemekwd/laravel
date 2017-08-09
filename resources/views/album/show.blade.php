@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:38px;">album</i>
        <span>{{ $album->title }}</span>
    </h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>
                <i class="material-icons">help_outline</i>
                @lang('album.show')
            </h3>
        </div>
        <div class="panel-body">
            <div class="inline pull-right">
                <img class="img-thumbnail" src="{{ asset('uploads/album/cover/' . $album->cover) }}" height="200" width="200"/>
            </div>
            <table class="table-condensed">
                <tbody>
                    <tr>
                        <td class="strong">@lang('album.form.artist')</td>
                        <td><a href="{{ route('artist.show', ['id' => $album->artist->id]) }}">{{ $album->artist }}</a></td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.description')</td>
                        <td>{{ $album->description }}</td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.distributor')</td>
                        <td>{{ $album->distributor }}</td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.release_date')</td>
                        <td>{{ \Carbon\Carbon::parse($album->releaseDate)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.record_year')</td>
                        <td>{{ $album->record_year }}</td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.genres')</td>
                        <td>
                            @foreach($album->genres as $genre)
                                {{ $genre->name_pl }}@if($loop->count > $loop->iteration), @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="strong">@lang('album.form.mediums')</td>
                        <td>
                            @foreach($album->mediums as $medium)
                                {{ $medium->name }}@if($loop->count > $loop->iteration), @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-heading">
            <h3>
                <i class="material-icons">audiotrack</i>
                @lang('track.list')
                <a href="{{ route('track.create', ['albumid' => $album->id]) }}" class="btn btn-success pull-right" role="button">
                    <i class="material-icons" style="vertical-align:top;margin-top:1px;">add_circle_outline</i>
                </a>
            </h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    @foreach($album->tracks as $track)
                    <tr>
                        <td class="strong">{{ $track->number }}</td>
                        <td>{{ $track->title }}</td>
                        <td>
                            {{ Form::open(['route' => ['track.destroy', $album->id, 'id' => $track->id], 'method' => 'DELETE']) }}
                                <a href="{{ route('track.edit', ['albumid' => $album->id, 'id' => $track->id]) }}" class="btn btn-warning" role="button">
                                    <i class="material-icons">create</i>
                                </a>
                                <button class="btn btn-danger" type="submit" role="button"><i class="material-icons">highlight_off</i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('album.edit', ['id' => $album->id]) }}" class="btn btn-warning pull-right" role="button">
        @lang('buttons.edit')
    </a>

    <a href="{{ route('album.index') }}" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
@endsection