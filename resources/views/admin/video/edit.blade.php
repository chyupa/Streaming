@extends('admin.master.master')
@section('section-title', 'Viewing Video')

@section('content')
  <div class="col-sm-12">
    <h2>Viewing Video</h2>
    @if( $studioVideo )
      <div class="col-sm-4">
        <h4>Original Video</h4>
        <video width="320" height="240" controls>
          <source src="{{ asset("uploads/$studioVideo->_user_id/$studioVideo->file_name") }}" type="video/mp4">
          Your browser does not support video tag
        </video>
      </div>
      <div class="col-sm-4">
        <h4>Video Preview</h4>
        @if( $studioVideo->studioVideoPreview )
          <video width="320" height="240" controls>
            <source src="{{ asset("uploads/$studioVideo->_user_id/preview.mp4") }}" type="video/mp4">
            Your browser does not support video tag
          </video>
        @else
          <form class="form" method="post" action="{{ route('admin.post.video.create-preview', $studioVideo->_id) }}" role="form">
            {!! csrf_field() !!}
            <button class="btn btn-primary">Create Preview</button>
          </form>
        @endif
      </div>
      <div class="col-sm-12">
        <h4>Video Thumbnails</h4>
        @if(count($studioVideo->studioVideoImagePreview))
          @foreach($studioVideo->studioVideoImagePreview as $image)
            <img src="{{ asset("uploads/$studioVideo->_user_id/$image->preview_name") }}" alt="" class="img-responsive img-preview" width="120">
          @endforeach
        @else
          <form class="form" method="post" action="{{ route('admin.post.video.create-images', $studioVideo->_id) }}" role="form" >
            {!! csrf_field() !!}
            <button class="btn btn-primary">Create thumbnails</button>
          </form>
        @endif
      </div>
    @endif
  </div>
@stop