@extends('admin.master.master')
@section('section-title', 'Viewing all Categories')

@section('content')
    <div class="col-sm-12">
        @if(count($categories))
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->_id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                            <a href="#">Show Related categories</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3>No Categories found!</h3>
        @endif
    </div>
@stop