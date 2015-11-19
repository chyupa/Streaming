@extends('admin.master.master')
@section('section-title', 'Related Categories')

@section('content')
    <div class="col-sm-12">
        <h2>Related Categories</h2>
        @include('errors.form')
        <form action="{{ route('admin.post.category.related', $category->_id) }}" class="form" method="post" role="form">
            @for($i = 1; $i < 6; $i++)
                <div class="form-group">
                    <label for="category-{{$i}}">Category {{$i}}</label>
                    <select class="form-control" name="related[]">
                        <option value="0">Choose Related Category</option>
                        @foreach($categories as $categ)
                            <option value="{{$categ->_id}}">{{$categ->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endfor
                <div class="form-group">
                    {{csrf_field()}}
                    <button class="btn btn-primary">Add related Categories</button>
                </div>
        </form>
    </div>
@stop