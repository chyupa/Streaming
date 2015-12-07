@extends('front.master.master')
@section('section-title', 'Welcome to the best streaming app')
@section('content')
  <div class="col-sm-12">
    @if($videos)
      @foreach($videos as $video)
        @include('front.partials.video', $video)
      @endforeach
    @else
      <p>No videos uploaded yet</p>
    @endif
  </div>
@stop