@extends('base')

@section('content')
    {{ Form::open(['route' => ['album.index'], 'method' => 'GET']) }}
        <h1>
            <div class="pull-left">
                <i class="material-icons" style="font-size:48px;">library_music</i>
                <span>@lang('album.list')</span>
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
                        @lang('album.form.title')
                        <button class="btn btn-default filter" type="submit" name="filter" value="title ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="title DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('album.form.release_date')
                        <button class="btn btn-default filter" type="submit" name="filter" value="release_date ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="release_date DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('album.form.artist')
                        <button class="btn btn-default filter" type="submit" name="filter" value="artist_id ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="artist_id DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
                    <th>
                        @lang('album.form.distributor')
                        <button class="btn btn-default filter" type="submit" name="filter" value="distributor_id ASC"><i class="material-icons" title="ASC">arrow_drop_up</i></button>
                        <button class="btn btn-default filter" type="submit" name="filter" value="distributor_id DESC"><i class="material-icons" title="DESC">arrow_drop_down</i></button>
                    </th>
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
    {{ Form::close() }}

    <a href="#" class="btn btn-default" role="button" aria-label="Left Align">
        <i class="material-icons">undo</i>
        @lang('buttons.back')
    </a>
    <a href="{{ route('album.create') }}" class="btn btn-success pull-right" role="button">
        <i class="material-icons">add_circle_outline</i>
        @lang('buttons.add')
    </a>
@endsection