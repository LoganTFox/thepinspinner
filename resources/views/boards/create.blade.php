@extends('layouts.layout')

@extends('layouts.navbar')

@section('content')
    <div style="margin-top: 25px;" class="container">
        <h1>Add New Board</h1>
        <hr>
        <form method="POST" action="/boards/create" class="col-sm-8">
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
                <label for="title">Board Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="link">Board Link</label>
                <input type="text" class="form-control" id="link" name="link">
            </div>

            <div class="form-group">
                <label for="category_id">Choose a Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Choose One...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Board</button>

        </form>
    </div>
@endsection