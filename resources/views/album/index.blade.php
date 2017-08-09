@extends('base')

@section('content')
    <h1>
        <i class="material-icons" style="font-size:48px;">library_music</i>
        <span>@lang('album.list')</span>
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>@lang('album.form.title')</th>
                <th>@lang('album.form.release_date')</th>
                <th>@lang('album.form.artist')</th>
                <th>@lang('album.form.distributor')</th>
                <th>@lang('album.form.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td><img src="{{ asset('uploads/album/cover/' . $album->cover) }}" class="img-thumbnail" width="50" height="50"/></td>
                <td>{{ $album->title }}</td>
                <td>{{ \Carbon\Carbon::parse($album->release_date)->format('d-m-Y') }}</td>
                <td>{{ $album->artist }}</td>
                <td>{{ $album->distributor }}</td>
                <td>
                    {{ Form::open(['route' => ['album.destroy', $album->id], 'method' => 'DELETE']) }}
                        <a href="{{ route('album.show', ['id' => $album->id]) }}" class="btn btn-info" role="button">
                            <i class="material-icons">info_outline</i>
                            @lang('buttons.show')
                        </a>
                        <a href="{{ route('album.edit', ['id' => $album->id]) }}" class="btn btn-warning" role="button">
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
    <a href="{{ route('album.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection