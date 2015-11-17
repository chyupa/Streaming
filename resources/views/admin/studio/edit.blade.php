@extends('admin.master.master')
@section('section-title', 'Edit Studio')

@section('content')
    <div class="col-sm-12">
        <h2>Editing Studio</h2>
        @include('errors.form')
        <form action="{{route("admin.post.studio.edit", $user->_id)}}" method="post" class="form" role="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->studioMetadata->name or '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="{{ $user->studioMetadata->address or ''  }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ $user->studioMetadata->phone or ''  }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email:</label>
                <input type="text" name="contact_email" id="contact_email" value="{{ $user->studioMetadata->contact_email or ''  }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>

@stop