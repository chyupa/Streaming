@extends('admin.master.master')
@section('section-title', 'Viewing all Studios')

@section('content')
    <div class="col-sm-12">
        @if(count($studios))
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($studios as $studio)
                    <tr>
                        <td>{{$studio->_id}}</td>
                        <td>{{$studio->email}}</td>
                        <td>{{$studio->created_at}}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>No Studios found!</h3>
        @endif
    </div>
@stop