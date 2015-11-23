@extends('admin.master.master')
@section('section-title', "Upload Video")

@section('content')
  <div class="col-sm-12">
    <h2>Upload Video for {{$user->studioMetadata->name or $user->_id}}</h2>
    @include('errors.form')
    <form action="{{ route('admin.post.video.upload', $user->_id) }}" method="post" enctype="multipart/form-data" class="form" role="form">
      <div class="form-group">
        <label for="name">Video Name:</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="form-group">
        <label for="price">Video Price:</label>
        <input type="text" class="form-control" name="price" id="price">
      </div>
      <div class="form-group">
        <label for="video">Upload Video:</label>
        <input type="file" class="form-control" name="video" id="video">
      </div>
      <div class="form-group">
        {{csrf_field()}}
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
@stop