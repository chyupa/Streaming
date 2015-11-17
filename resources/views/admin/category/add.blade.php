@extends('admin.master.master')
@section('section-title', 'Add a new category')

@section('content')
    <div class="col-sm-12">
        <h2>Add category</h2>
        @include('errors.form')
        <form action="{{ route('admin.get.category.add')  }}" method="post" class="form" role="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@stop