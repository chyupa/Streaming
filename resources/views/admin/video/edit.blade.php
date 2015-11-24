@extends('admin.master.master')
@section('section-title', 'Viewing Video')

@section('content')
  <div class="col-sm-12">
    <h2>Viewing Video</h2>
    @if( $video )
    <div class="col-sm-4">
      <h4>Video Preview</h4>
      @if( $video-> )
      <video src="{{ $video->get  }}"></video>
    </div>
  </div>
@stop