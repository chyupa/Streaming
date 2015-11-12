@extends('admin.master.master')
@section('section-title', 'Dashboard Area')
@section('content')
    <div class="col-sm-12">
        <div class="jumbotron">
            <h1 class="text-center">Welcome to the admin section of the site</h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Useful Links</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="{{route('admin.show.users')}}" class="list-group-item">Users</a>
                    <a href="{{route('admin.show.studios')}}" class="list-group-item">Studios</a>
                    <a href="{{route('admin.show.categories')}}" class="list-group-item">Categories</a>
                    <a href="#" class="list-group-item">Something</a>
                </div>
            </div>
        </div>
    </div>
@stop