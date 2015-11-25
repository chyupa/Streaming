@extends('admin.master.master')
@section('section-title', 'Showing all Videos')

@section('content')
  <div class="col-sm-12">
    @if( $videos->isEmpty() )
      <h4>No videos upload at this time! Check later.</h4>
    @else
      <ul>
        @foreach($videos as $video)
          <li>
            <a href="{{ route('admin.get.video.edit', [$user->_id, $video->_id])  }}">{{$video->name}}</a>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
@stop