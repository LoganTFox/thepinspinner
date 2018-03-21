@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->title }}</h5>
                <a href="/categories/update/{{ $category->id }}" class="btn btn-primary">Edit Category</a>
                <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger">Delete Category</a>
            </div>
        </div>
    </div>
@endsection