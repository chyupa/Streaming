@extends('admin.master.master')
@section('section-title', "Edit Category")
@section('content')
    <div class="col-sm-12">
        <h2>Editing Category</h2>
        @include('errors.form')
        <form action="{{ route('admin.post.category.edit', $category->_id)  }}" method="post" class="form" role="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name or ''  }}">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@stop