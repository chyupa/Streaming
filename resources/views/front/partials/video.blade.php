<div class="col-sm-3">
  <h4>{{ $video->name }}</h4>
  <video class="single-video" controls>
    @if($video->studioVideoPreview)
      <source src="{{ asset("uploads/$video->_user_id/preview.mp4") }}" type="video/mp4">
    @else
      <source src="{{ asset("uploads/$video->_user_id/$video->file_name") }}" type="video/mp4">
    @endif
    Your browser does not support video tag
  </video>
</div>