@extends('master.master')
@section('section-title', 'User Register')
@section('content')

    @include('errors.form')
    <div class="col-sm-4">
        <form method="post" action="{{route('auth.post.user.register')}}" class="form" role="form">
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

@stop