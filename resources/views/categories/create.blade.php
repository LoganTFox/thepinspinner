@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <h1>Add New Category</h1>
        <hr>
        <form method="POST" action="/categories/create" class="col-sm-8">
            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <button type="submit" class="btn btn-success">Create Category</button>

        </form>
    </div>
@endsection