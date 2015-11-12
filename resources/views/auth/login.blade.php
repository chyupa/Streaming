@extends('master.master')
@section('section-title', 'User Login')
@section('content')
    <div class="col-sm-4">
        @include('errors.form')
        <form method="post" action="{{route('auth.post.login')}}" class="form" role="form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </form>
    </div>
@stop