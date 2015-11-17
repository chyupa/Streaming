@extends('admin.master.master')
@section('section-title', 'Viewing all users')

@section('content')
    <div class="col-sm-12">
        @if(count($users))
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->_id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('admin.get.user.edit', $user->_id)}}">Edit</a>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $users->render() !!}
            </div>
        @else
            <h3>No users found!</h3>
        @endif
    </div>
@stop