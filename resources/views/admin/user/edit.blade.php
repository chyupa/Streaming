@extends('admin.master.master')
@section('section-title', 'Edit User')

@section('content')
    <div class="col-sm-12">
        <h3>Editing User #{{$user->_id}}</h3>
        @include('errors.form')
        <form class="form" method="post" action="{{route('admin.post.user.edit', $user->_id )}}" role="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{isset($user->userMetadata->name) ? $user->userMetadata->name : ''}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@stop