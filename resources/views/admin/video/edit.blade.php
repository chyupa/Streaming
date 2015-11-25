@extends('admin.master.master')
@section('section-title', 'Viewing Video')

@section('content')
  <div class="col-sm-12">
    <h2>Viewing Video</h2>
    @if( $studioVideo )
      <div class="col-sm-4">
        <h4>Video Preview</h4>
        <video width="320" height="240" controls>
          <source src="{{ asset("uploads/$studioVideo->_user_id/$studioVideo->file_name") }}" type="video/mp4">
          Your browser does not support video tag
        </video>
      </div>
      <div class="col-sm-4">
        <h4>Video Thumbnails</h4>

      </div>
    @endif
  </div>
@stop