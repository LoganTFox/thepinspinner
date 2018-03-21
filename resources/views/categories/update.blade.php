@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <form method="POST" action="/categories/update/{{ $category->id }}" class="col-sm-8">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
            </div>

            <button type="submit" class="btn btn-success">Update Category</button>

        </form>
    </div>
@endsection